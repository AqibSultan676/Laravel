<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this import

class HomeController extends Controller
{
    public function showForm()
    {
        $user = Auth::user();
        return view('home');
    }

}
