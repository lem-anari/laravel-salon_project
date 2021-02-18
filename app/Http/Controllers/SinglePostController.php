<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function firstStep($id){
        require_once __DIR__.'../../../../queries.php';
        $service = \App\Service::where('id', '=', $id)->first();
        //получить id client
        $id_service = $service['id'];
        $name = \Auth::user()->name;
        // dd($name);
        $i_client = get_idClient($dbh, $name);
        $id_client = $i_client[0]['id'];

        $pos = addReg_show_serviceFromPos_services($dbh, $id_service);
        $pos_id = $pos[0]['n_pos'];
        $staff_names = addReg_show_staffWithPos($dbh, $pos_id);
        $client = get_Client($dbh, $id_client);
        // dd($client);
        // return view('redaction/add_registration_staff', ['staff_names'=>$staff_names, 'service'=>$service, 'client'=>$client]);
        //после этого попробовать с админки подкобчить
        
        return view('single_post', ['service' => $service, 'staff_names'=>$staff_names, 'client_id'=>$id_client]);
    }
    public function nextStep(Request $request){
        require_once __DIR__.'../../../../queries.php';
        $price = $request->input('price');
        $service_id = $request->input('service_id');
        $client_id = $request->input('client_id');
        $staff_id = substr($request->input('staff'), 0, 2);

        $work_days = addReg_show_WorkDays($dbh, $staff_id);
        // dd($price);
        $days = addReg_show_WorkDays__($dbh,$work_days);
        // dd($days);
        $array=array();
        for($a=0; $a<count($days); $a++){
            array_push($array, $days[$a]['date_']);
        }
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
        return view('clients/schedule', ['price'=>$price, 'real_days'=>$array_right_dates, 'service_id'=>$service_id, 'client_id'=>$client_id, 'staff_id'=>$staff_id]);
    }
    
}
