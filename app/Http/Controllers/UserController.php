<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function profile()
    {
        // Get the logged-in user
        $user = Auth::user();

        // Return the profile view with the user's data
        return view('user.profile', compact('user'));


    }

    public function update(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Get the logged-in user
        $user = Auth::user();

        // Ensure the user is an instance of the User model
        if (!$user instanceof User) {
            return redirect()->route('login')->with('error', 'User not found or not authenticated');
        }

        // Manually update fields
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Check if a new password is provided
        if ($request->filled('password')) {
            $user->password = bcrypt($validated['password']);
        }

        // Save the changes and check if it was successful
        if ($user->save()) {
            return redirect()->route('profile')->with('success', 'Profile updated successfully');
        } else {
            return redirect()->route('profile')->with('error', 'There was an issue updating your profile');
        }
    }
    // app/Http/Controllers/UserController.php

    

    
        // Method to show the dashboard for regular users
        public function dashboard()
        {
            return view('user.dashboard');  // Ensure this view exists
        }
    
        // Other methods like profile, etc.
    
    
        
      
            
          
       
        

}
