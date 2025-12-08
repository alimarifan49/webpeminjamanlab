<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $pass  = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($pass, $user['password'])) {

            $session->set([
                'user_id' => $user['id'],
                'role'    => $user['role'],
                'logged_in' => TRUE
            ]);

            // Redirect berdasarkan role
            if ($user['role'] === 'superadmin') return redirect()->to('/superadmin');
            if ($user['role'] === 'admin') return redirect()->to('/admin');
            return redirect()->to('/user');

        } else {
            return redirect()->back()->with('error', 'Login gagal');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
