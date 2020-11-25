<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class b extends Controller
{
    public function unique_n_generator(Request $req)
    {   //run time
        function microtime_float()
        {
            list($usec, $sec) = explode(" ", microtime());
            return ((float)$usec + (float)$sec);
        }

        //$data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ03657asdfghjkloiuytrewdrfg8nmiuytr8915548abcefghijklmnopqrstuvwxyz';//string for generating random value
        $data = '1234567890ABCDEFGHaaaddIJKLMNOassdPQRSTUffhhjutrrvVWXYZ03657asdfghjk999loiuytrewdrfg34hnjkolwqzxcvb8289279878718nmiuytr8915548abcefghijklmno222pqrstuvwxyz01234567891011';
        $time_start = microtime_float();// script run time
        $number = $req->number;
        $all_numbers = array();
        // unique number generator
        for ($x = 1; $x <= $number; $x++) {
            //$unique_number = uniqid();
           $unique_number = substr(str_shuffle($data), rand(2,20), 7);
            //$unique_number = substr(str_shuffle($data), rand(2,20), 5);
           // $unique_number=rand(10,99).$unique_number;
            //$unique_number=substr($unique_number, 6, 7);
            //$unique_number=substr(sha1(mt_rand()), 0, 7);
            //$unique_number = substr($unique_number, 0, 7);
            // $unique_number=md5($unique_number);
            $all_numbers[$x] = $unique_number;
        }


//
//$test=array();
//
//        for ($x = 1; $x <= 1; $x++) {
//           // $unique_number = uniqid(7);
//            $test[$x]=$number;
//        }


        ////////////////////

        //$api=Http::post('http://localhost:8000/test_b',$test);
        $api = Http::post('http://localhost:8000/test_b', $all_numbers);//api call
        echo $api->body();


        echo "<br><br>";

        $time_end = microtime_float();//end script
        $time = $time_end - $time_start;// calculate total run time

        echo "total run time\n $time \nseconds\n";
    }

}
