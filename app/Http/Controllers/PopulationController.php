<?php

namespace App\Http\Controllers;

use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        $populations = Population::with('town')->get();
        return view('populations.index', compact('populations'));
    }
}

