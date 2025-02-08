<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Content;

class GraphController extends Controller
{
    public function index()
    {
        $labels = ['Users', 'Contents'];
        $values = [User::count(), Content::count()];

        return view('graph', compact('labels', 'values'));
    }
}
