<?php
    /**
     * Created by PhpStorm.
     * User: Mahdi
     * Date: 8/21/2019
     * Time: 5:37 PM
     */

    namespace App\Lib;

    class Lib
    {

        public static function convertFaToEn($string)
        {

            $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            $arabic  = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

            $num                  = range(0, 9);
            $convertedPersianNums = str_replace($persian, $num, $string);
            $englishNumbersOnly   = str_replace($arabic, $num, $convertedPersianNums);

            return $englishNumbersOnly;
        }


        public static function unique_ObjectArray($objectArray, $key)
        {

            $result = array();

            foreach ($objectArray as $item)
            {
                array_push($result,$item[$key]);
            }

            return array_unique($result);
        }

    }
