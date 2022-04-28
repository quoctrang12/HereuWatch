<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\Account;


class LoginController extends Controller
{
    public function logout()
    {
        $this->signout();
        redirect('/home');
    }
    public function showLoginForm()
    {
        // nếu đã login redirect sang home
        if (check_login() == true) {
            redirect('/home');
        }
        $error = false;
        return $this->sendPage('auth/Signin', ['error' => $error]);
    }

    public function login()
    {
        $credentials = $this->getCredentials();
        $user = $this->authenticate($credentials);
        if ($user) {
            $user->password = null; // remove password
            $_SESSION['user'] = serialize($user); // chuyển model sang chuỗi

            if (isset($_POST['remember_me'])) {

                // chuyển mảng sang chuỗi để mã hóa
                $str = serialize($credentials);

                // hàm mã hóa chuỗi được định nghĩa trong helpers.
                $encrypted = encrypt($str, ENCRYPTION_KEY);

                // cookie hết hạn 01/12/2022 23:59:59
                setcookie('credentials', $encrypted, mktime(23, 59, 59, 12, 1, 2022));
            }
            if ($user->username === 'Admin') {
                redirect('/admin');
            } else
                redirect('/home');
        }

        $error = true;

        // nếu login sai show form login và hiển thị lỗi
        return $this->sendPage('auth/Signin', ['error' => $error]);
    }

    public function getCredentials()
    {
        return [
            'username' => $_POST['username'] ?? null,
            'password' => $_POST['password'] ?? null
        ];
    }
    public function authenticate($credentials)
    {
        //return false;

        $user = Account::where(['username' => $credentials['username']])->first();

        if ($user) {
            // kiểm tra mật khẩu nhập với mật khẩu đã băm trong CSDL
            $pass_hash = password_encrypt($credentials['password']);
            if (password_check($user->password, $pass_hash)) {
                return $user;
            }
            return null;
        }
        return null;
    }
    public function signout()
    {
        unset($_SESSION['user']);
        if (isset($_COOKIE['credentials'])) {
            setcookie('credentials', null, time() - 3600);
        }
    }
}
