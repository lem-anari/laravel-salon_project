<?php

    $dsn = 'pgsql:host=127.0.0.1; dbname=heliot';
    // $user = 'guests';
    // $password = '1';

    try{

        // $dbh = new PDO($dsn,$user,$password);
        // $dbh1;
        if(\Auth::check()){
            $username = session('username');
            $ds;
            $u;
            $pass;
            // dd(\Auth::user()->role_);
            /*$result = $dbh->query("select role_name from users
            inner join roles on role_=n_of_role
            where name='".$username."'");
            $array = array();
            while($data = $result->fetch(PDO::FETCH_ASSOC)){
            array_push($array, $data);
            }*/
            $rol = \Auth::user()->role_;
            if($rol == 1){
                $u = 'admins';
                $pass = 'admin';
                $_SERVER['DB_USERNAME'] = 'admins';
                $_SERVER['DB_PASSWORD'] = 'admin';
                // $dbh = new PDO($dsn,$u,$pass);
                session(['role_panel' => $u]);
            }elseif($rol == 2){
                $u = 'clients';
                $pass = '4';
                // $dbh = new PDO($dsn,$u,$pass);
                session(['role_panel' => $u]);
            }elseif($rol == 3){
                $u = 'ourstaff';
                $pass = 'ffat2';
                // $dbh = new PDO($dsn,$u,$pass);
                session(['role_panel' => $u]);
            }else{
                $u = 'clients';
                $pass = '2';
                
                // $result = $dbh->query("UPDATE users SET role_ = '2' WHERE n_of_service=1;");
                session(['role_panel' => 'clients']);
            }
            $dbh = new PDO($dsn,$u,$pass);
            // dd(phpinfo());
            
           /* $dbh = pg_connect("host=127.0.0.1 dbname=heliot user=admins password=admin", PGSQL_CONNECT_FORCE_NEW);
            $result = pg_query($dbh, "select * from current_user");
            $data = pg_fetch_row($result);*/
            // dd($data);
            /*if($array != []){
                if($array[0]['role_name'] == 'admins'){
                    $password = 'admin';
                }elseif($array[0]['role_name'] == 'clients'){
                    $password = '4';
                }elseif($array[0]['role_name'] == 'ourstaff'){
                    $password = 'ffat2';
                }
                $user = $array[0]['role_name'];
                session(['role_panel' => $array[0]['role_name']]);
            }*/
            
            // dd($dbh);
        }else{
            $user = 'guests';
            $password = '1';
            $dbh = new PDO($dsn,$user,$password);
            // $dbh = pg_connect("host=127.0.0.1 dbname=heliot user=guests password=1", PGSQL_CONNECT_FORCE_NEW);
            // dd($dbh);
            // dd(extension_loaded('pgsql') ? 'yes':'no');
            session(['role_panel' => 'guests']);
        }
    }catch(PDOException $e){
       echo $e->getMessage();
    }
