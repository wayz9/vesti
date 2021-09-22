<?php   

namespace App\Controllers;

use App\Models\User;
use App\Services\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return parent::guestLayout('auth/login');
    }

    public function login()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = new Validator;

        if(!$validator->validate($_POST, $rules)){
            return redirect('/login');
        }

        $validated = $validator->validated();

        $user = (new User)->authenticate($validated['email'], password_verify($validated['password'], PASSWORD_BCRYPT));

        if(!$user){
            session()->set('error', 'Email or password is incorect');
            return redirect('/login');
        }

        session()->set('authenticated_user', $user);
        session()->set('is_admin', true);

        return redirect('/');
    }

    public function logout()
    {
        if(session()->exists('is_admin') || session()->delete('authenticated_user')){
            session()->delete('is_admin');
            session()->delete('authenticated_user');
        }

        return redirect('/');
    }
}