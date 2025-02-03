<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;
use App\Models\Town;
use App\Models\Population;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the dashboard for the authenticated user.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return $this->adminDashboard();
        } else {
            return $this->userDashboard();
        }
    }

    /**
     * Show the admin dashboard (CRUD all data).
     */
    public function adminDashboard()
    {
        $counties = County::all();
        $towns = Town::all();
        $populations = Population::all();
        $contents = Content::all();

        return view('admin.dashboard', compact('counties', 'towns', 'populations', 'contents'));
    }

    /**
     * Show the user dashboard (CRUD own data only).
     */
    public function userDashboard()
    {
        $userId = Auth::id();

        $counties = County::all(); // Users can view all counties
        $towns = Town::all(); // Users can view all towns
        $populations = Population::all(); // Users can view all population data
        $contents = Content::where('user_id', $userId)->get(); // Users can only manage their own content

        return view('user.dashboard', compact('counties', 'towns', 'populations', 'contents'));
    }
}
