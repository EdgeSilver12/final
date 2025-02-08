<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;

class ContentController extends Controller
{
    

    public function index()
    {
        $contents = Content::all();
        return view('contents.index', compact('contents'));
    }

    public function create()
    {
        return view('contents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        Content::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('contents.index')->with('success', 'Content created successfully');
    }

    public function edit(Content $content)
    {
        if (Auth::check() && (Auth::user()->role === 'admin' || Auth::id() === $content->user_id)) {
            return view('contents.edit', compact('content'));
        }
        return redirect()->route('contents.index')->with('error', 'Unauthorized');
    }

    public function update(Request $request, Content $content)
    {
        if (Auth::check() && (Auth::user()->role === 'admin' || Auth::id() === $content->user_id)) {
            $request->validate([
                'title' => 'required|string|max:255',
                'body' => 'required',
            ]);

            $content->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);

            return redirect()->route('contents.index')->with('success', 'Content updated successfully');
        }
        return redirect()->route('contents.index')->with('error', 'Unauthorized');
    }

    public function destroy(Content $content)
    {
        if (Auth::check() && (Auth::user()->role === 'admin' || Auth::id() === $content->user_id)) {
            $content->delete();
            return redirect()->route('contents.index')->with('success', 'Content deleted successfully');
        }
        return redirect()->route('contents.index')->with('error', 'Unauthorized');
    }
}
