<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Models\Cart;
use PDOException;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return $this->sendPage('auth/Register', ['error' => false]);
    }
    
    public function register()
    {
        $credentials = $this->getCredentials();

        try {
            $successed = Account::insert([
                'username' =>  $credentials['username'],
                'password' => $credentials['password']
            ]);
            if ($successed) {
                $user = User::create([
                    'email' =>  $credentials['email'],
                    'hoten' => $credentials['name'],
                    'username' => $credentials['username']
                ]);
                Cart::create([
                    'ID_user' => $user->ID_user
                ]);

                redirect('/login');
            }
        } catch (PDOException $e) {
            return $this->sendPage('auth/Register', ['error' => true]);
        }
    }
    public function getCredentials()
    {
        return [
            'name' => $_POST['name'] ?? null,
            'username' => $_POST['username'] ?? null,
            'email' => $_POST['email'] ?? null,
            'password' => $_POST['password'] ?? null,
            'confirm_password' => $_POST['confirm_password'] ?? null
        ];
    }
}
