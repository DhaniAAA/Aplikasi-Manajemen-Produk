<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('dashboard');
        }
        return view('auth/login', ['title' => 'Login']);
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'   => $user['id'],
                'name'      => $user['name'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'logged_in' => true,
            ]);

            return redirect()->to('dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah.');
    }

    public function register()
    {
        return view('auth/register', ['title' => 'Register']);
    }

    public function createAccount()
    {
        $validation =  \Config\Services::validation();

        $rules = [
            'name' => 'required',
            'username' => 'required|min_length[4]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->userModel->save([
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'staff' // Default role for new users
        ]);

        return redirect()->to('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function forgotPassword()
    {
        return view('auth/forgot_password', ['title' => 'Lupa Password']);
    }

    public function sendResetLink()
    {
        // Placeholder logic for forgot password
        // In a real app, you would handle email sending here.
        return redirect()->to('forgot-password')->with('success', 'Jika email Anda terdaftar, tautan reset kata sandi telah dikirim.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
