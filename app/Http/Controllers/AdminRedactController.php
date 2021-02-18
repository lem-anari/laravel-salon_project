<?php

namespace App\Http\Controllers;
use App\Client;
use App\Service;
use App\Pos_service;
use App\Staff;
use App\Schedule;
use App\Registration;
use Illuminate\Http\Request;
use App\User;
use App\Work_day;
use Carbon\Carbon;

class AdminRedactController extends Controller
{
    public function add_client(Request $request)
    {
        return view('add_client');
    }
    public function save(Request $request)
    {
        require_once __DIR__.'../../../../queries.php';
        $this->validate($request, [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'telefone_number' => 'required|min:10|numeric',
            'number_of_procedurs' => 'required|min:1',
        ]);
            $client = new Client();
            $client->first_name = $request->input('first_name');
            $client->last_name = $request->input('last_name');
            $client->telefone_number = $request->input('telefone_number');
            $client->number_of_procedurs = $request->input('number_of_procedurs');
            $client->save();
            // saveClient($dbh, $client);
   
        return redirect('admins_panel');
    }

    public function add_service(Request $request)
    {
        return view('redaction/add_service', ['position_of_staffs' => \App\Position_of_staff::all()]);
    }
    public function save_service(Request $request)
    {
        require_once __DIR__.'../../../../queries.php';
        $this->validate($request, [
            'name_of_service' => 'required|max:50',
            'price' => 'required|numeric',
            'duration' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png',
        ]);
        
        $service = new Service();
        $service->name_of_service = $request->input('name_of_service');
        $service->price = $request->input('price');
        $service->duration = $request->input('duration');
        $image = $request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('images/services_photo/', $imageName);
            $service->image = 'images/services_photo/' . $imageName;
        }
        // dd($service);
        $service->save();
        $id = $service->id;

        $pos_service = new Pos_service();
        $pos_service->n_service = $id;
        $pos_ser = $request->input('position_of_staffs');
        $pos_service->n_pos = substr($pos_ser, 0, 1);
        // dd($pos_service);
        savePos_service($dbh, $pos_service);
        return redirect('admins_panel');
    }
    
    public function view_registrations()
    { 
        require_once __DIR__.'../../../../queries.php';
        $show_reg = view_regist($dbh);
        return view('redaction/registrations', ['registrations'=>$show_reg]);
    }

    public function add_registration()
    { 
        require_once __DIR__.'../../../../queries.php';
        return view('redaction/add_registration', ['clients'=>\App\Client::all(), 'services'=>\App\Service::all()]);
    }
    public function  showNext(Request $request)
    {
        require_once __DIR__.'../../../../queries.php';
        $service_id = substr($request->input('service'), 0, 2);
        $service = $request->input('service');
        $client = $request->input('client');
        $pos = addReg_show_serviceFromPos_services($dbh, $service_id);
        $pos_id = $pos[0]['n_pos'];
        $staff_names = addReg_show_staffWithPos($dbh, $pos_id);
        // dd($staff_names);
        return view('redaction/add_registration_staff', ['staff_names'=>$staff_names, 'service'=>$service, 'client'=>$client]);
    }
    
    public function  showNext2(Request $request)
    {
        require_once __DIR__.'../../../../queries.php';
        $service = $request->input('service');
        $client = $request->input('client');
        $staff = $request->input('staff');

        $staff_id = substr($request->input('staff'), 0, 2);
        $work_days = addReg_show_WorkDays($dbh, $staff_id);
        $days = addReg_show_WorkDays__($dbh,$work_days);
        // dd($days);
        $array=array();
        for($a=0; $a<count($days); $a++){
            array_push($array, $days[$a]['date_']);
        }
        // dd($array);
        $date = new Carbon();
        $dt = substr($date.date(1), 0, 10);
        // dd($dt);
        $array_right_dates=array();
        $array_no_right_dates=array();
        for($a=0; $a<count($days); $a++){
            if($array[$a] < $dt){
                array_push($array_no_right_dates, $array[$a]);
            }else{
                array_push($array_right_dates, $array[$a]);
            }
        }
        // dd($array_right_dates);
        return view('redaction/add_registration_schedule', ['real_days'=>$array_right_dates, 'service'=>$service, 'client'=>$client, 'staff'=>$staff]);
        //'work_days'=>$days,
    }
    public function  showNext3(Request $request)
    {
        require_once __DIR__.'../../../../queries.php';
        $schedule_id = substr($request->input('days'), 0, 2);
        $days = $request->input('days');
        $service_ = $request->input('service');
        $client = $request->input('client');
        $staff = substr($request->input('staff'), 2);
        // $date = substr($days, 0,10);
        $service = substr($service_, 2);
        
        // dd($service);
        return view('redaction/add_registration_time', [ 'schedule_id'=>$schedule_id, 'service'=>$service_, 'days'=>$days, 'client'=>$client, 'staff'=>$staff]);
    }
    public function save_registration(Request $request)
    { 
        require_once __DIR__.'../../../../queries.php';
        $this->validate($request, [
            'time' => 'required|max:5'
        ]);
        $forSave_service = substr($request->input('service'), 0, 2);
        // dd($forSave_service);
        $forSave_client = substr($request->input('client'), 0, 2);

        $registration = new Registration();
        $registration->n_client = $forSave_client;
        $registration->time_ = $request->input('time');
        $registration->n_service = $forSave_service;
        $registration->n_schedule = substr($request->input('schedule'), 0, 2);
        $forSave_price = getPrice($dbh, $forSave_service);
        $registration->price = $forSave_price[0]['price'];
        
        // dd($registration);
        
        try {
            $registration->save();
            require_once __DIR__.'../../../../queries.php';
            $show_reg = view_regist($dbh);
            return view('redaction/registrations', ['registrations'=>$show_reg]);
        } catch (\Exception $e) {
            return view('redaction/error', ['err'=>"Время занято"]);
        }
    }

    public function add_staff(Request $request)
    {
        return view('redaction/add_staff', ['position_of_staffs' => \App\Position_of_staff::all()]);
    }
    public function save_staff(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'telefone_number' => 'required|min:10|numeric',
        ]);
        $staff = new Staff();
        $staff->first_name = $request->input('first_name');
        $staff->last_name = $request->input('last_name');
        $staff->telefone_number = $request->input('telefone_number');
        $position = $request->input('position_');
        $staff->position_ = substr($position, 0, 1);
        $staff->save();
        return redirect('admins_panel');
    }
    public function fire_staff(Request $request)
    {
        if ($request->method() == 'DELETE') {
            $staff = Staff::find($request->input('id'));
            // dd($staff);
            $schedule = Schedule::where('n_staff', '=', $request->input('id'))->first();
            dd($schedule);
            // $staff->delete();
            return back();
        } else {
            return view('redaction/fire_staff', ['staff' => \App\Staff::all()]);
        }
        // return view('redaction/fire_staff', ['staff' => \App\Staff::all()]);
    }

    public function add_schedule(Request $request)
    {
        return view('redaction/add_schedule', ['work_days' => \App\Work_day::all(), 'staff' => \App\Staff::all()]);
    }
    public function save_schedule(Request $request)
    {
        $schedule = new Schedule();
        
        $staff = $request->input('staff');
        $work_day = $request->input('work_day');
        $schedule->n_staff = substr($staff, 0, 1);
        $schedule->n_work_day = substr($work_day, 0, 2);
        $schedule->save();
        return redirect('admins_panel');
    }

    public function add_fineBonusSalary(Request $request)
    {
        return view('redaction/fine_bonus_salary', ['fines' => \App\Fine::all(), 'bonuses' => \App\Bonus::all(), 'staff' => \App\Staff::all()]);
    }
    public function save_fineBonusSalary(Request $request)
    {
        $staff_id = $request->input('staff');
        $fine = $request->input('fine');
        $bonus = $request->input('bonus');
        $staff = Staff::find(1)->where ('id', '=',  substr($staff_id, 0, 1))->first();
        if($fine !== "choose"){
            $staff->fine_ = substr($fine, 0, 1);
        }
        if($bonus !== "choose"){
            $staff->bonus_ = substr($bonus, 0, 1);
        }
        // dd($staff);
        $staff->save();
        return redirect('admins_panel');
    }
    public function add_Salary(Request $request)
    {
        return view('redaction/up_salary', ['services' => \App\Service::all()]);
    }
    public function save_Salary(Request $request)
    {
        require_once __DIR__.'../../../../queries.php';
        $service = $request->input('service');
        $service_id = substr($service, 0, 2);
        add_salary10($dbh, $service_id);
        return redirect('admins_panel');
    }

    public function add_role(Request $request)
    {
        return view('redaction/role', ['users' => \App\User::all(), 'staff'=>\App\Staff::all()]);
    }
    public function save_role(Request $request)
    {
        require_once __DIR__.'../../../../queries.php';
        $usr_id = substr($request->input('usr'), 0, 2);
        $stff = $request->input('stff');
        $user = User::find(1)->where('id', '=', $usr_id)->first();
        $role = $request->input('role');
        // dd($role);
        if($role !== "choose"){
            $user->role_ = substr($role, 0, 1);
        }
        if($stff !== "choose staff name"){
            $user->staff_id = substr($stff, 0, 2);
        }
        // dd($user->role_);
        $user->save();
        return redirect('admins_panel');
    }
    public function delete_reg(Request $request)
    {
        if ($request->method() == 'DELETE') {
            $registration = Registration::find($request->input('id'));
            $registration->delete();
            return back();
        } else {
            require_once __DIR__.'../../../../queries.php';
            $show_reg = view_regist($dbh);
            return view('redaction/registr_delete', ['registrations'=>$show_reg]);
        }
    }

    public function add_work_day(Request $request)
    {
        return view('redaction/add_work_days');
    }
    public function save_work_day(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date|after:tomorrow',
            'time_' => 'required|max:8',
            'time_end' => 'required|max:8',
        ]);
        $work_day = new Work_day();
        $work_day->date_ = $request->input('date');
        $work_day->time_ = $request->input('time_');
        $work_day->time_end = $request->input('time_end');
        $work_day->save();
        return redirect('admins_panel');
    }
}
