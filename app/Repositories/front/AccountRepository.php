<?php

namespace App\Repositories\front;
use App\Models\admin\Category;
use App\Models\Order;
use App\Models\OrderItem;
use DB;
use Auth;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageUpload;
use App\Models\OrderReview;
// use Illuminate\Support\Facades\Auth as FacadesAuth;

class AccountRepository
{
    use ImageUpload;

    public function my_account()
    {
        $categories = Category::where(['status' => 1, 'category_type' => 1])->orderBy('id', 'desc')->get();
        $myOrders = Order::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $user = Auth::user();
        $cities = City::whereIn('id' ,[89577 ,89578,89579,89590,170800,89588])->get();
        return view('front.account.dashboard', compact('categories', 'myOrders', 'user', 'cities'));
    }

    public function setting_account($request)
    {
        $user = Auth::user();
 
        if(isset($request->password)) {
            if(Hash::check($request->cpassword, $user->password)) {

            } else {
                return back()->with(['message' => 'password not matched with current password']);
            }
        }

        if(isset($request->password) && $request->password != $request->password_confirmation) {
            return back()->with(['message' => 'password confirmation not matched']);
        }

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            // 'cpassword' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->parmanent_address = $request->parmanent_address;
        $user->birth_date = $request->birth_date;

        $profileImg = $user->user_photo;
        if($request->hasFile('user_photo')){
            $directory='img/profile';
            $profileImg = $this->image($request->user_photo, $directory);
        }

        $user->user_photo = $profileImg;
        if(isset($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->update();
        return back()->with(['message' => 'Profile updated successfully']);
    }
}
