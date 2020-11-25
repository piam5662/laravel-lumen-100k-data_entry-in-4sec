<?php

namespace App\Http\Controllers;

use App\unique;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class ExampleController extends Controller
{
    public function unique_n_generator(Request $request)
    {

        $number = $request->input();//input

        $number_count = count($number);// input length
//$count_in=unique::count();
        $unique_code = [];
        $x = 0;

        $res = "success no duplicate data ";


        foreach ($number as $value) {

            // assigning to associative arrays
            $unique_code[$x]['unique_code'] = $value;
            $x++;

        }

        $count_in = unique::count();
//chunk, try , catch
        function chunk_entry($unique_code, $number, $count_in)
        {

            print_r("total row before insert:");
            print_r($count_in);
//            print_r("\narray size:");
//            print_r($number);
            $chunks = array_chunk($unique_code, 10000);
            foreach ($chunks as $chunk) {
                try {
                    unique::insert($chunk);

                }//try if all values are unique
                catch (QueryException  $e) {
                    $errorCode = $e->errorInfo[1];
                    if ($errorCode == 1062) {
                        //$data = '1234567890ABCDEFGHaaaddIJKLMNOassdPQRSTUffhhjutrrvVWXYZ03657asdfghjk999loiuytrewdrfg34hnjkolwqzxcvb8289279878718nmiuytr8915548abcefghijklmno222pqrstuvwxyz01234567891011';
                         $data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcefghijklmnopqrstuvwxyz';
                        $unique_code2 = [];
                        $count1 = unique::count();
                        $count2 = $count1 - $count_in;
                        $count_f = $number - $count2;
                        print_r($count_f);
                        for ($i = 1; $i <= $count_f; $i++) {

                            $unique_number = substr(str_shuffle($data), rand(1, 20), 7);
//                            $unique_number = substr(str_shuffle($data), rand(2,20), 5);
//                            $unique_number=rand(10,99).$unique_number;



                            //$unique_number = uniqid();
                            //$unique_number=md5($unique_number);
                            //$unique_number=substr($unique_number, 6, 7);
                            // $unique_number = substr($unique_number, 0, 7);
                            // $unique_number = substr(str_shuffle($data), 0, 7);
                            //$unique_code2[$i]['unique_code'] = $unique_number;
                            $unique_code2[$i]['unique_code'] = $unique_number;
                        }
                        print_r("\nduplicated value . \n");
                        return chunk_entry($unique_code2, $number, $count_in);//call DB entry function to check and entry

                    }

                }//catch if duplicate value found : generate new value
            }//foreach chunk value
        }//chunk_entry function


        chunk_entry($unique_code, $number_count, $count_in);
         print_r("total row after inset: ");
         print_r(unique::count());
        return response($res);
    }
}
