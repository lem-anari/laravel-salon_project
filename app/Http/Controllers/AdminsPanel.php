<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsPanel extends Controller
{
    public function __invoke()
    {
        return view('admins_panel');
    }
}
