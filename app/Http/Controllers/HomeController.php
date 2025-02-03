<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;

class HomeController extends Controller
{
    /**
     * Show the general dashboard.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the user dashboard.
     */
    public function userDashboard()
    {
        // Fetch content that belongs to the authenticated user
        $contents = Content::where('user_id', Auth::id())->get();

        // Pass the content to the user dashboard view
        return view('user.dashboard', compact('contents'));
    }

    /**sa
     * Show the admin dashboard.
     */
    public function adminDashboard()
    {
        // Check if the logged-in user is an admin
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
        }

        // Fetch all content for admin
        $contents = Content::all();

        // Pass the content to the admin dashboard view
        return view('admin.dashboard', compact('contents'));
    }

}
