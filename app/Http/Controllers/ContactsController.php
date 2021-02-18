<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function __invoke()
    {
        $time_from = \App\Work_day::min('time_');
        $time_to = \App\Work_day::max('time_end');
        return view('contacts', ['work_time_from'=>$time_from, 'work_time_to'=>$time_to]);
    }
}
