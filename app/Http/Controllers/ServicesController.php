<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __invoke()
    {
        require_once __DIR__.'../../../../queries.php';
        $no_popular = no_pop($dbh);
        $popular = pop($dbh);

        if(\Auth::check()){
            $l3d = last3days($dbh);
        }else{
            $l3d = '';
        }
        return view('services',['services'=>\App\Service::all(), 'last3days'=>$l3d, 'popular'=>$popular, 'no_popular'=>$no_popular]);
    }
}
