<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function show($table)
    {
        // Check if table exists
        $databaseName = env('DB_DATABASE');
        $existingTables = array_map(fn($t) => $t->{"Tables_in_$databaseName"}, DB::select('SHOW TABLES'));

        if (!in_array($table, $existingTables)) {
            abort(404, "Table not found");
        }

        // Fetch table data
        $tableData = DB::table($table)->get();

        return view('tables', compact('table', 'tableData'));
    }
}

