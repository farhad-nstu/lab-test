<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\admin\UserValidateRequest;
use App\Http\Requests\admin\UserUpdateRequest;
use App\Traits\ImageUpload;
use DataTables;
use Auth;

class UserController extends Controller
{

    //import trait
    use ImageUpload;

    public function index(Request $request)
    {
        $list = User::orderBy('id','DESC')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
            ->addIndexColumn()

                // for role
                ->addColumn('role', function($row){
                if($row->role==1){
                    if($row->id == Auth::id()) {
                        $role = 'Myself';
                    } else {
                        $role='Admin';
                    } 
                } elseif($row->role == 2) {
                    $role='User';
                } else {
                    $role='No Role';
                }
                  return $role;
                })

              //for action column
              ->addColumn('action', function($row){
                 $btn = '<a class="btn btn-primary btn-sm" title="Edit User" href="'.route('users.edit',$row->id).'"> <i class="fa fa-edit"></i></a>';
                 return $btn;
               })
               ->rawColumns(['role', 'action'])
               ->make(true);
            }
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserValidateRequest $request)
    {
        $image='';
        if($request->hasFile('user_photo')){
            $directory='img/users';
            $image=$this->image($request->user_photo,$directory);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email      = $request->email;
        $user->phone      = $request->phone;
        $user->password   = Hash::make($request->password);
        $user->role       = $request->role;
        $user->user_photo = $image;
        $user->save();
        return redirect()->route('users.index')
        ->with('success','User created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $User)
    {
        return view('admin.user.edit',compact('User'));
    }

    public function update(UserUpdateRequest $request,User $user)
    {
      $image=$user->user_photo;
      if($request->hasFile('user_photo')){
          $directory='img/users';
          $image=$this->image($request->user_photo,$directory);
      }
      $user = User::findOrFail($user->id);
      $user->name = $request->name;
      $user->email      = $request->email;
      $user->phone      = $request->phone;
      $user->password   = Hash::make($request->password);
      $user->role       = $request->role;
      $user->user_photo = $image;
      $user->save();
      return redirect()->route('users.index')
      ->with('success','User update successfully.');
    }

    public function destroy($id)
    {
        //
    }
}
