<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function show_income()
    {
        require_once __DIR__.'../../../../queries.php';
        $show_inc = show_income($dbh);
        // dd($show_inc);
        return view('redaction/income', ['show_inc'=>$show_inc]);
    }
    public function show_staff_income()
    {
        require_once __DIR__.'../../../../queries.php';
        $show_inc = show_staff_income($dbh);
        // dd($show_inc);
        return view('redaction/staff_income',['show_inc'=>$show_inc]);
    }
}
