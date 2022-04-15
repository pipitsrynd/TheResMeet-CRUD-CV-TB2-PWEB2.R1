<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct(){
        $this->userModel = new User();
    }

    public function signup()
    {
        $this->userModel->save([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'phone_number' => $this->request->getVar('phone_number'),
        ]);

        return redirect()->to('/')->with('message','Signed up successfully');
    }
}
