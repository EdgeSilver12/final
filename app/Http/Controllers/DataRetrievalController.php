<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataRetrievalController extends Controller
{
    public function retrieve(Request $request)
    {
        $table = $request->input('table');
        $role = $request->input('role');

        if (!in_array($table, ['users', 'contents'])) {
            return redirect()->back()->with('error', 'Invalid table selection.');
        }

        $query = DB::table($table);

        if ($table === 'users' && $role) {
            $query->where('role', $role);
        }

        $data = $query->get();
        $columns = array_keys((array) $data->first());

        return view('data-retrieval', compact('data', 'columns'));
    }
}
