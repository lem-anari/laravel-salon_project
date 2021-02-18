<?php
require_once('connect.php');

  function pop($dbh){
    $result = $dbh->query("select name_of_service, image, services.id, count(n_service) as popular_services
    from services
    left join registrations on services.id=n_service
    group by name_of_service, image, services.id order by popular_services desc limit(3);");
    $array = array();
    while($data = $result->fetch(PDO::FETCH_ASSOC)){
      array_push($array, $data);
    }
    return $array;
   }


   function no_pop($dbh){
    $result = $dbh->query("select name_of_service, image, services.id, count(n_service) as not_popular_services
    from services
    left join registrations on registrations.id=n_service
    group by name_of_service, image, services.id order by not_popular_services asc limit(3);");
    $array = array();
    while($data = $result->fetch(PDO::FETCH_ASSOC)){
      array_push($array, $data);
    }
    return $array;
   }
   function last3days($dbh){
    $result = $dbh->query("select first_name,last_name, 'staff' as pos from registrations
    inner join schedules on n_schedule = schedules.id
    inner join staff on n_staff = staff.id
    inner join work_days on schedules.n_work_day = work_days.id
    where registrations.n_service = 1 and work_days.date_ between '2020-05-15' and '2020-05-18'
    union
    select first_name,last_name, 'client' as pos from registrations
    inner join clients on n_client = clients.id
    inner join schedules on n_schedule = schedules.id
    inner join work_days on n_work_day = work_days.id
    where n_service = 1  and work_days.date_ between '2020-05-15' and '2020-05-18';");
    $array = array();
    while($data = $result->fetch(PDO::FETCH_ASSOC)){
      array_push($array, $data);
    }
    return $array;
   }
   function savePos_service($dbh, $pos_service){
    //  dd($pos_service->n_pos);
    $result = $dbh->query("insert into public.pos_services (n_service, n_pos) values (13, $pos_service->n_pos);");
    if($result === false){
      dd($dbh->errorInfo());
    }
   }
  function add_salary10($dbh, $service_id){
    $result = $dbh->query("update position_of_staffs 
    SET salary=salary * 1.1 WHERE pos_id = 
    (SELECT n_pos from pos_services WHERE n_service = $service_id);");
    if($result === false){
      dd($dbh->errorInfo());
    }
  }
    function view_regist($dbh){
      $result = $dbh->query("select first_name, last_name, name_of_service, date_, registrations.time_, registrations.id from registrations
      inner join clients on n_client=clients.id
      inner join services on n_service=services.id
      inner join schedules on n_schedule=schedules.id
      left join work_days on n_work_day = work_days.id
      where clients.id = n_client and services.id = n_service;");
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      return $array;
    }
    function addReg_show_serviceFromPos_services($dbh, $service_id){
      $result = $dbh->query("select * from pos_services where n_service =$service_id;");
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      return $array;
    }
    
    function addReg_show_staffWithPos($dbh, $pos_id){
      $result = $dbh->query("select * from staff where position_ =$pos_id;");
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      return $array;
    }

    function addReg_show_WorkDays($dbh, $staff_id){
      // $string = "select * from schedules where n_staff =$staff_id;";
      $result = $dbh->query("select * from schedules where n_staff =$staff_id;");
      
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      // dd($array);
      return $array;
    }

    function addReg_show_WorkDays__($dbh, $work_days){
      $array__ = array();
      $array = array();
      for($a=0; $a<count($work_days); $a++){
        $days = $work_days[$a]['n_work_day'];
        $result = $dbh->query("select * from work_days where id =$days;");
        while($data = $result->fetch(PDO::FETCH_ASSOC)){
          array_push($array, $data);
        }
      }
      return $array;
    }

    function show_salary_staff($dbh, $staff_id){
      $result = $dbh->query("select first_name,last_name,salary + coalesce(bonuses.amount,'0,00 ?') - coalesce(fines.amount,'0,00 ?') as salary 
      from staff
      inner join position_of_staffs on position_=pos_id
      left join bonuses on bonus_=id_bonus
      left join fines on fine_=id_fine
      where staff.id=$staff_id;");
      // dd($result);
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      return $array;
    }

    function show_schedule_staff($dbh, $staff_id){
      $result = $dbh->query("select date_, time_, time_end from schedules
      inner join work_days ON schedules.n_work_day =work_days.id
      inner join staff ON schedules.n_staff =staff.id
      where staff.id=$staff_id;");
      // dd($result);
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      return $array;
    }

    function show_income($dbh){
      $result = $dbh->query('WITH Avg_day_sum AS
      (
       SELECT work_days.date_, SUM(services."price"::numeric) AS "average_price"
       FROM registrations join schedules on n_schedule=schedules.id
      join work_days on schedules.n_work_day = work_days.id
      join services on n_service=services.id
       GROUP BY 1
        ORDER BY 1
      ),
      Avg_month_sum AS
      (
       SELECT date_part(\'month\', date_) AS "month", AVG("average_price") AS "average_price"
       FROM Avg_day_sum
       GROUP BY 1
        ORDER BY 1
      )
      SELECT "month", "average_price" "Current month",  "average_price"
      - LAG("average_price") OVER () "Previous month"
      FROM Avg_month_sum
      GROUP BY  1, "average_price"
      ORDER BY 1;');
      
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      return $array;
    }

    function show_staff_income($dbh){
      $result = $dbh->query("select * FROM top_staff_incom;");
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      return $array;
    }

    function employees_ranked($dbh){
      $result = $dbh->query("select first_name, last_name, count(r.n_schedule) as amount_clients from staff s
      join schedules sc ON sc.n_staff = s.id
      join registrations r ON r.n_schedule = sc.id
      group by(s.id) order by amount_clients desc;");
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      return $array;
    }

    function all_services_clients($dbh){
      $result = $dbh->query("select last_name, first_name, n_client, count(*) as Used_all_services from registrations
      inner join clients on n_client=clients.id
      group by n_client, last_name,first_name having count(*)>9 order by Used_all_services desc;");
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      return $array;
    }
    function getPrice($dbh, $forSave_service){
      $result = $dbh->query("select price from services where id =$forSave_service");
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      // dd($array);
      return $array;
    }

    function get_idClient($dbh, $name){
      $result = $dbh->query("select clients.id from clients where first_name ='$name'");
      
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      // dd($array[0]['id']);
      return $array;
     }
     function get_Client($dbh, $id_client){
      $result = $dbh->query("select * from clients where id =$id_client");
      
      $array = array();
      while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($array, $data);
      }
      // dd($array[0]['id']);
      return $array;
     }