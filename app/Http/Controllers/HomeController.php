<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user && $user->usertype === 'admin') {
            return view('dashboard');
        } else {
            return view('guest');
        }
    }

}
