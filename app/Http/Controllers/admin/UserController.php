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

        $list = User::whereNotIn('role', ["2"])->orderBy('id','DESC')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addIndexColumn()

                  // for user name
                  ->addColumn('customer_name', function($row){
                    return $row->firstname.'&nbsp'.$row->lastname;
                   })

                  // for role
                  ->addColumn('role', function($row){
                     if($row->role==1){
                        $role='Admin';
                     }
                     elseif($row->role==2){
                        $role='User';
                     }
                     else{
                        $role='No Role';
                     }
                      return $role;
                    })

                   // for role
                  ->addColumn('status', function($row){
                    if($row->active==1){
                       $status='Active';
                     }
                     else{
                        $status='Inactive';
                     }
                      return $status;
                    })

                  //for action column
                  ->addColumn('action', function($row){
                     $btn = '<a class="btn btn-primary btn-sm" title="Edit User" href="'.route('users.edit',$row->id).'"> <i class="fa fa-edit"></i></a>';
                     return $btn;
                   })
                   ->rawColumns(['customer_name','role','status','action'])
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
        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->email      = $request->email;
        $user->phone      = $request->phone;
        $user->password   = Hash::make($request->password);
        $user->role       = $request->role;
        $user->user_photo = $image;
        $user->active	    = $request->status;
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
      $user->firstname = $request->firstname;
      $user->lastname  = $request->lastname;
      $user->email      = $request->email;
      $user->phone      = $request->phone;
      $user->password   = Hash::make($request->password);
      $user->role       = $request->role;
      $user->user_photo = $image;
      $user->active	    = $request->status;
      $user->save();
      return redirect()->route('users.index')
      ->with('success','User update successfully.');
    }

    public function destroy($id)
    {
        //
    }

    // Profile edit update
    public function edit_profile()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();

        if(isset($request->npassword)) {
            if(Hash::check($request->cpassword, $user->password)) {

            } else {
                return back()->with(['notMatchMessage' => 'Password not matched with current password']);
            }
        }

        if(isset($request->npassword) && $request->npassword != $request->password_confirmation) {
            return back()->with(['notConfirmMessage' => 'Password confirmation not matched']);
        }

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            // 'phone' => ['required', 'string', 'max:255'],
            // 'cpassword' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        // $user->city = $request->city;
        // $user->parmanent_address = $request->parmanent_address;
        // $user->birth_date = $request->birth_date;

        $profileImg = $user->user_photo;
        if($request->hasFile('user_photo')){
            $directory='img/profile';
            $profileImg = $this->image($request->user_photo, $directory);
        }

        $user->user_photo = $profileImg;

        if(isset($request->npassword)) {
            $user->password = Hash::make($request->npassword);
        }

        $user->update();
        return back()->with(['message' => 'Profile updated successfully']);
    }
}
