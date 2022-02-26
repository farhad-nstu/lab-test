<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\front\AccountRepository;

class AccountController extends Controller
{
    private $data;

    public function __construct(AccountRepository $data)
    {
        $this->data = $data;
    }

    public function my_account()
    {
        return $this->data->my_account();
    }
    
    public function setting_account(Request $request)
    {
        return $this->data->setting_account($request);
    }

}
