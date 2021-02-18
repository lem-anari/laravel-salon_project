<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;

class SingleRegistrationController extends Controller
{
    public function  nextStep2(Request $request)
    {
        require_once __DIR__.'../../../../queries.php';
        $price = $request->input('price');
        $schedule_id = substr($request->input('days'), 0, 2);
        // dd($schedule_id);
        $days = $request->input('days');
        $service_id = $request->input('service_id');
        $client_id = $request->input('client_id');
        $staff_id = $request->input('staff_id');
        
        // dd($service);
        return view('clients/schedule2', ['price'=>$price, 'schedule_id'=>$schedule_id, 'days'=>$days, 'service_id'=>$service_id, 'client_id'=>$client_id, 'staff_id'=>$staff_id]);
        // 
    }
    public function nextStep3(Request $request)
    {
        $registration = new Registration();
        $time = $request->input('time');
        $price = $request->input('price');
        $schedule_id = $request->input('schedule_id');
        $service_id = $request->input('service_id');
        $client_id = $request->input('client_id');
        $staff_id = $request->input('staff_id');
        $registration->time_ = $time;
        $registration->n_service = $service_id;
        $registration->n_client = $client_id;
        $registration->price = $price;
        $registration->n_schedule = $schedule_id;
        // $registration->save();
        try {
            // dd($registration);
            $registration->save();
            require_once __DIR__.'../../../../queries.php';
            $show_reg = view_regist($dbh);
            return view('redaction/registrations', ['registrations'=>$show_reg]);
        } catch (\Exception $e) {
            return view('redaction/error', ['err'=>"Время занято"]);
        }
        // dd($service);
        return view('single_post');
    }
}
