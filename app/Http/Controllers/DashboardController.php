<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Content;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Show user dashboard with all database tables
    public function index()
    {
        // Fetch all users and contents (you can add pagination if needed)
        $users = User::all();
        $contents = Content::all();

        // Pass the data to the dashboard view
        return view('dashboard', compact('users', 'contents'));
    }

    // Show the form to create a new content
    public function create()
    {
        return view('content.create');
    }

    // Store the new content in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Content::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Content created successfully.');
    }

    // Show the form to edit content
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('content.edit', compact('content'));
    }

    // Update the content
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $content = Content::findOrFail($id);
        $content->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Content updated successfully.');
    }

    // Delete the content
    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('user.dashboard')->with('success', 'Content deleted successfully.');
    }
}
