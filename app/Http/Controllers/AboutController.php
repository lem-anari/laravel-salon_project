<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke(){
        require_once __DIR__.'../../../../queries.php';
        if(\Auth::check()){
            $employees_ranked = employees_ranked($dbh);
            $all_services_clients = all_services_clients($dbh);
            return view('about', ["employees_ranked"=>$employees_ranked, 'all_services_clients'=>$all_services_clients]);
        }else{
            return view('about');
        }
    }
}
