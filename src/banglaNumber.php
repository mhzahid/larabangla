<?php

namespace larabangla;
use Exception;

class gonit
{

    /**
     * It convert english number to bangla number.
     * Accept array, which can contain number, string numeric value in it. [e.g. array(11, 2.256, '5.578', 78, 98, '1,205') ]
     * @param $array;
     * @return numeric array. 
     * 
     */
    public function convertToBN($array)
    {
        if (is_array($array)) {
            $fin_array = array();

            $len = count($array);

            for ($i=0; $i < $len; $i++) {
                $temp_array = str_split($array[$i],1);

                $newNumber = array();
                
                for ($j=0; $j < count($temp_array); $j++) { 
                    switch ($temp_array[$j]) {
                        case '0':
                            array_push($newNumber, '০');
                            break; 
                        case '1':
                            array_push($newNumber, '১');
                            break;
                        case '2':
                            array_push($newNumber, '২');
                            break;
                        case '3':
                            array_push($newNumber, '৩');
                            break;
                        case '4':
                            array_push($newNumber, '৪');
                            break;
                        case '5':
                            array_push($newNumber, '৫');
                            break;
                        case '6':
                            array_push($newNumber, '৬');
                            break;
                        case '7':
                            array_push($newNumber, '৭');
                            break;
                        case '8':
                            array_push($newNumber, '৮');
                            break;
                        case '9':
                            array_push($newNumber, '৯');
                            break;
                        case '.':
                            array_push($newNumber, '.');
                            break;
                    }
                }

                array_push($fin_array,implode('', $newNumber));
            }

            return $fin_array;

        }
        else{
            throw new Exception("Given value is not an array. It must be an array");
        }

    }




    /**
     * It convert bangla number to english number.
     * Accept array, which value must be numeric or string numeric or both.
     * @param $array;
     * @return numeric array. 
     * 
     */
    public function convertToEN($array)
    {
        if (is_array($array)) {
            $fin_array = array();

            $len = count($array);

            for ($l=0; $l < $len; $l++) {
                $array[$l] = "'".$array[$l]."'";
            }
            
            for ($i=0; $i < $len; $i++) {
                $temp_array = preg_split('//u', $array[$i], null, PREG_SPLIT_NO_EMPTY);

                $newNumber = array();

                
                for ($j=0; $j < count($temp_array); $j++) { 
                    switch ($temp_array[$j]) {
                        case '০':
                            array_push($newNumber, '0');
                            break; 
                        case '১':
                            array_push($newNumber, '1');
                            break;
                        case '২':
                            array_push($newNumber, '2');
                            break;
                        case '৩':
                            array_push($newNumber, '3');
                            break;
                        case '৪':
                            array_push($newNumber, '4');
                            break;
                        case '৫':
                            array_push($newNumber, '5');
                            break;
                        case '৬':
                            array_push($newNumber, '6');
                            break;
                        case '৭':
                            array_push($newNumber, '7');
                            break;
                        case '৮':
                            array_push($newNumber, '8');
                            break;
                        case '৯':
                            array_push($newNumber, '9');
                            break;
                        case '0':
                            array_push($newNumber, '0');
                            break; 
                        case '1':
                            array_push($newNumber, '1');
                            break;
                        case '2':
                            array_push($newNumber, '2');
                            break;
                        case '3':
                            array_push($newNumber, '3');
                            break;
                        case '4':
                            array_push($newNumber, '4');
                            break;
                        case '5':
                            array_push($newNumber, '5');
                            break;
                        case '6':
                            array_push($newNumber, '6');
                            break;
                        case '7':
                            array_push($newNumber, '7');
                            break;
                        case '8':
                            array_push($newNumber, '8');
                            break;
                        case '9':
                            array_push($newNumber, '9');
                            break;
                        case '.':
                            array_push($newNumber, '.');
                            break;
                    }
                }

                array_push($fin_array,implode('', $newNumber));
            }

            return $fin_array;

        }
        else{
            throw new Exception("Given value is not an array. It must be an array");
        }

    }




    /**
     * 
     * This function do the summation operation.
     * Accept only one array with multiple data type in numeric value 
     * Or multiple parameter with multiple data type in numeric value.
     * 
     * user can define return result language type bangla ('bn') or english ('en')
     * in last parameter. If language is not defined by default result will be return in bangla
     * 
     * @param mixed;
     * @return string or numeric;
     * 
     */
    public function sum()
    {

        if (func_num_args() < 2 || gettype(func_get_arg(0)) == "array" && func_get_arg(1) == "bn" || gettype(func_get_arg(0)) == "array" && func_get_arg(1) == "en") {
            
            if (gettype(func_get_arg(0)) == "array") {

                /**
                 * it convert bangla to english;
                 */
                $cnvArray = $this->convertToEN(func_get_arg(0)); // converted value array;


                /**
                 * calculation function
                 */
                $fin_Sum = $this->sumHelper($cnvArray);


                /**
                 * get the user defined return value language
                 */
                $rtn_lang = "bn";

                if (func_num_args() == 2) {
                    $rtn_lang = func_get_arg(1);
                }
                


                /**
                 * return bangla type value;
                 */
                if ($rtn_lang == "bn") {
                    $bn_sum =  implode('',$this->convertToBN([$fin_Sum]));

                    return $bn_sum;
                }


                /**
                 * return english type value;
                 */
                if ($rtn_lang == "en") {

                    return $fin_Sum;

                }


            }
            else{
                throw new Exception("Type error ==> One parameter is detected, given parameter must be an array");
            }

        }
        else{

            $allowedCount = 0;
            $restrictedCount = 0;

            for ($i=0; $i < func_num_args(); $i++) {

                if (gettype(func_get_arg($i)) == "array") {
                    $restrictedCount += 1;
                } else {
                    $allowedCount += 1;
                }
                
            }


            // checking function parameter is it acceptable or not.
            if ( $allowedCount > 0 && $restrictedCount < 1) {

                /**
                 * it convert bangla to english;
                 */
                $cnvArray = $this->convertToEN(func_get_args()); // converted value array;


                /**
                 * calculation function
                 */
                $fin_Sum = $this->sumHelper($cnvArray);


                /**
                 * get the user defined return value language
                 */
                $usr_lang = func_get_arg(func_num_args() - 1);

                switch ($usr_lang) {
                    case 'en':
                        $rtn_lang = "en";
                        break;
                    case 'bn':
                        $rtn_lang = "bn";
                        break;
                    default:
                        $rtn_lang = "bn";
                        break;
                }


                /**
                 * return bangla type value;
                 */
                if ($rtn_lang == "bn") {
                    $bn_sum =  implode('',$this->convertToBN([$fin_Sum]));

                    return $bn_sum;
                }


                /**
                 * return english type value;
                 */
                if ($rtn_lang == "en") {

                    return $fin_Sum;

                }


            } else {
                throw new Exception("Type error ==> Multiple parameter type detected. Given parameters type must be same. Array not acceptable in multiple parameter.");
            }

            
        }

    }


    

    /**
     * 
     * This function do the subtraction operation.
     * Accept only one array with multiple data type in numeric value 
     * Or multiple parameter with multiple data type in numeric value.
     * 
     * user can define return result language type bangla ('bn') or english ('en')
     * in last parameter. If language is not defined by default result will be return in bangla
     * 
     * @param mixed;
     * @return string or numeric;
     * 
     */
    public function sub()
    {

        if (func_num_args() < 2 || gettype(func_get_arg(0)) == "array" && func_get_arg(1) == "bn" || gettype(func_get_arg(0)) == "array" && func_get_arg(1) == "en") {
            
            if (gettype(func_get_arg(0)) == "array") {

                //local var;
                $minus = false;


                /**
                 * it convert bangla to english;
                 */
                $cnvArray = $this->convertToEN(func_get_arg(0)); // converted value array;


                /**
                 * calculation function
                 */
                $fin_Sub = $this->subHelper($cnvArray);


                /**
                 * check negative value
                 */
                if ($fin_Sub < 0) {
                    $minus = true;
                }


                /**
                 * get the user defined return value language
                 */
                $rtn_lang = "bn";

                if (func_num_args() == 2) {
                    $rtn_lang = func_get_arg(1);
                }
                


                /**
                 * return bangla type value;
                 */
                if ($rtn_lang == "bn") {
                    $bn_sub =  implode('',$this->convertToBN([$fin_Sub]));

                    if ($minus) {
                        return '-'.$bn_sub;
                    } else {
                        return $bn_sub;
                    }

                }


                /**
                 * return english type value;
                 */
                if ($rtn_lang == "en") {

                    return $fin_Sub;

                }


            }
            else{
                throw new Exception("Type error ==> One parameter is detected, given parameter must be an array");
            }

        }
        else{

            //local var;
            $allowedCount = 0;
            $restrictedCount = 0;
            $minus = false;

            for ($i=0; $i < func_num_args(); $i++) {

                if (gettype(func_get_arg($i)) == "array") {
                    $restrictedCount += 1;
                } else {
                    $allowedCount += 1;
                }
                
            }


            // checking function parameter is it acceptable or not.
            if ( $allowedCount > 0 && $restrictedCount < 1) {

                /**
                 * it convert bangla to english;
                 */
                $cnvArray = $this->convertToEN(func_get_args()); // converted value array;


                /**
                 * calculation function
                 */
                $fin_Sub = $this->subHelper($cnvArray);

                
                /**
                 * check negative value
                 */
                if ($fin_Sub < 0) {
                    $minus = true;
                }

                
                /**
                 * get the user defined return value language
                 */
                $usr_lang = func_get_arg(func_num_args() - 1);

                switch ($usr_lang) {
                    case 'en':
                        $rtn_lang = "en";
                        break;
                    case 'bn':
                        $rtn_lang = "bn";
                        break;
                    default:
                        $rtn_lang = "bn";
                        break;
                }


                /**
                 * return bangla type value;
                 */
                if ($rtn_lang == "bn") {
                    $bn_sub =  implode('',$this->convertToBN([$fin_Sub]));

                    if ($minus) {
                        return '-'.$bn_sub;
                    } else {
                        return $bn_sub;
                    }
                    
                }


                /**
                 * return english type value;
                 */
                if ($rtn_lang == "en") {

                    return $fin_Sub;

                }


            } else {
                throw new Exception("Type error ==> Multiple parameter type detected. Given parameters type must be same. Array not acceptable in multiple parameter.");
            }

            
        }

    }



    /**
     * 
     * This function do the division operation.
     * Accept only numeric value 
     * Or string numerical type value.
     * 
     * user can round up the result by passing round up value in 3rd parameter
     * user can define return result language type bangla ('bn') or english ('en') in 4th parameter
     * If language is not defined by default result will be return in bangla
     * 
     * @param mixed;
     * @return string or numeric;
     * 
     */
    public function div($divisible, $divisor, $roundUp = null, $lang = null)
    {
        /**
         * check divisor value. if it is equal to zero(0) then throw exception;
         */
        if ($divisor == 0 || $divisor == "০") {

                throw new Exception('Division by zero.');
                
        }



        if ($divisible !== null && $divisor !== null && $divisible >= 0 && $divisor >= 0) {


            /**
             * it convert bangla to english;
             */
            $divisible = $this->convertToEN([$divisible]);

            $divisor = $this->convertToEN([$divisor]);

            $roundUp = $this->convertToEN([$roundUp]);



            /**
             * calculation function
             */
            $fin_div = $this->divHelper($divisible, $divisor, $roundUp);



            /**
             * get the user defined return value language
             */
            if ($lang == "bn") {

                $bn_div = implode('', $this->convertToBN([$fin_div]));
                return $bn_div;

            } elseif ($lang == "en") {

                return $fin_div;

            } else {

                $bn_div = implode('', $this->convertToBN([$fin_div]));
                return $bn_div;

            }


        } else {

            throw new Exception("Error ! This function expect at-least two parameter. 0 parameter given in");

        }
        
    }




    /**
     * 
     * Helper functions
     * 
     */
     private function sumHelper($array)
     {
        // result variable;
        $sum = 0;

        // local type array, it have same type value in array indexes;
        $sameTypeArray = array();

        // calculating array length;
        $len = count($array);

        // final loop for type conversion and summation;
        for ($j=0; $j < $len; $j++) { 

            array_push($sameTypeArray, (double) $array[$j]);
            $sum += $sameTypeArray[$j];
            
        }

        return $sum;

     }

     private function subHelper($array)
     {

        // local type array, it have same type value in array indexes;
        $sameTypeArray = array();

        // calculating array length;
        $len = count($array);

        // type conversion;        
        for ($j=0; $j < $len; $j++) { 

            array_push($sameTypeArray, (double) $array[$j]);
            
        }

        //set inti value;
        $sub = $sameTypeArray[0];

        // final loop for subtraction;
        for ($i=0; $i < count($sameTypeArray)-1; $i++) { 

            $sub -= $sameTypeArray[$i+1];

        }

        return $sub;

     }

     private function divHelper($divisible, $divisor, $roundUp = null)
     {
         $dbl = (int) $divisible[0];
         $dvr = (int) $divisor[0];
         $rd  = (int) $roundUp[0];

         $quotient = ($dbl/$dvr);

         if ($rd !== null && $rd > 0) {

            $rounded_quotient = round($quotient, $rd);
            return $rounded_quotient;

         } else {

            return $quotient;

         }
         
         
     }


}

