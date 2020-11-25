<?php

namespace App\Http\Controllers;

use App\unique;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function unique_n_generator(Request $request)
    {

     $number=$request->input();


        print_r(unique::count());

        $unique_code=[];
        $x=0;

        $res="success no duplicate data ";

   //  $check_unique = unique::select('unique_code')->get()->pluck('unique_code');

//
//        function checking_u($value,$check_unique,$res)
//        {
//
//
//            if (in_array($value,$check_unique->toArray())){
//                $value = uniqid(7);
//                    $res="error";
//                return checking_u($value,$check_unique,$res);
//
//
//            }
//            else{
//                return $value;
//
//            }
//
//
//        }

        foreach ($number as $value){
            //$checked_value= checking_u($value,$check_unique,$res);

        // assigning to associative arrays
            $unique_code[$x]['unique_code']=$value;
            $x++;







        }


//~~~~
        $number_count = count($number);// input length
        $data = '1234567890ABCDEFGHaaaddIJKLMNOassdPQRSTUffhhjutrrvVWXYZ03657asdfghjk999loiuytrewdrfg34hnjkolwqzxcvb8289279878718nmiuytr8915548abcefghijklmno222pqrstuvwxyz01234567891011';
        // $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $unique_code2 = [];
        $count1 = unique::count();
       // $count2 = $count1 - $count_in;
       // $count_f = $number - $count2;
        //print_r($count_f);
        for ($i = 1; $i <= $number_count; $i++) {

            $unique_number = substr(str_shuffle($data), rand(1, 20), 7);
            //$unique_number = uniqid();
            //$unique_number=md5($unique_number);
            //$unique_number=substr($unique_number, 6, 7);
            // $unique_number = substr($unique_number, 0, 7);
            // $unique_number = substr(str_shuffle($data), 0, 7);
            //$unique_code2[$i]['unique_code'] = $unique_number;
            $unique_code2[$i]['unique_code'] = $unique_number;
        }


//~~

//chunk

        $chunks=array_chunk($unique_code,5000);
        foreach ($chunks as $chunk){
            unique::insert($chunk);
        }















         print_r("total row after inset: ");
         print_r(unique::count());




        return response($res);
    }
}
