<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StaffPanelController extends Controller
{
    public function __invoke(){
        return view('staff_panel');
    }
    public function show_staff_salary(){
        require_once __DIR__.'../../../../queries.php';
        $staff_id = Auth::user()->staff_id;
        $salary = show_salary_staff($dbh, $staff_id);
        return view('for_staff/staff_salary', ['salary'=>$salary]);
    }

    public function show_staff_schedule(){
        require_once __DIR__.'../../../../queries.php';
        $staff_id = Auth::user()->staff_id;
        $schedule = show_schedule_staff($dbh, $staff_id);
        // dd($schedule);
        return view('for_staff/staff_schedule', ['schedule'=>$schedule]);
    }
}
