<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    public function index()
    {
        $towns = Town::with(['county', 'populations'])->get();
        return view('towns.index', compact('towns'));
    }
}

