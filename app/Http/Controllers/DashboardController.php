<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalContents = Content::count();
        $userContents = Content::where('user_id', Auth::id())->count();
        $contents = Content::latest()->take(5)->get();

        return view('dashboard', compact('totalUsers', 'totalContents', 'userContents', 'contents'));
    }
}
