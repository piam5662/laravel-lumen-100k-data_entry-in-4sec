<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class number extends Controller
{
    public function unique_n_generator(Request $req)
    {
        function microtime_float()
        {
            list($usec, $sec) = explode(" ", microtime());
            return ((float)$usec + (float)$sec);
        }



        $time_start = microtime_float();
        $number= $req->number;
        $all_numbers=array();

        for ($x = 1; $x <= $number; $x++) {
            $unique_number = uniqid(7);
           // $unique_number=md5($unique_number);
            $all_numbers[$x]=$unique_number;
        }



//        foreach ($all_numbers as $a){
//            echo "$a<br>";
//
//       }
//
//        $unique_code=[];
//$x=0;
//        foreach ($all_numbers as $value){
//            $unique_code[$x]['name']=$value;
//            $x++;
//        }
//
//        dd($unique_code);


$api=Http::post('http://localhost:8000/a',$all_numbers);
      echo $api->body();


echo "<br><br>";



        $time_end = microtime_float();
        $time = $time_end - $time_start;

        echo "total run time\n $time \nseconds\n";
    }

}
