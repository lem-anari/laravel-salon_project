<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        require_once __DIR__.'../../../../queries.php';
        $popular = pop($dbh);
        return view('index',['services'=>\App\Service::all(), 'popular' => $popular]);
    }
}
