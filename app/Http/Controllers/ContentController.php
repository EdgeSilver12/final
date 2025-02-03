<?php
namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Display content for all users
        $contents = Content::all(); // Or modify based on your needs
        return view('contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check if user is an admin
        if (Auth::check() && Auth::user()->role !== 'admin') {
            // Redirect non-admin users
            return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
        }

        // Show create form for admin only
        return view('contents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if user is an admin
        if (Auth::check() && Auth::user()->role !== 'admin') {
            // Redirect non-admin users
            return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
        }

        // Store the content
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Content::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('contents.index')->with('success', 'Content created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Display specific content for all users
        $content = Content::findOrFail($id);
        return view('contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Check if user is an admin
        if (Auth::check() && Auth::user()->role !== 'admin') {
            // Redirect non-admin users
            return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
        }

        // Show edit form for admin only
        $content = Content::findOrFail($id);
        return view('contents.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Check if user is an admin
        if (Auth::check() && Auth::user()->role !== 'admin') {
            // Redirect non-admin users
            return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
        }

        // Validate and update the content
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $content = Content::findOrFail($id);
        $content->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('contents.index')->with('success', 'Content updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Check if user is an admin
        if (Auth::check() && Auth::user()->role !== 'admin') {
            // Redirect non-admin users
            return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
        }

        // Delete the content
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('contents.index')->with('success', 'Content deleted successfully!');
    }
}