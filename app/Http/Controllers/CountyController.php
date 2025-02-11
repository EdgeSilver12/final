<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    public function index()
    {
        $counties = County::with('towns')->get();
        return view('counties.index', compact('counties'));
    }
}

