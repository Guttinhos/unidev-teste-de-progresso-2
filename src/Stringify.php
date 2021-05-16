<?php

namespace App;

use DateTime;
use Exception;

class Stringify
{
    /**
     * Recebe uma String no formato Json e deve retornar um valor formatado:
     * 
     * Exemplo de entrada:
     * {
     *     "name": "Maria",
     *     "lastname": "Amaral",
     *     "birth": 1980-01-01,
     *     "childrens": [
     *         { "name": "João", "age": 7 },
     *         { "name": "Maria", "age": 9 }
     *     ]
     * }
     * 
     * Exemplo de saída:
     * [
     *     "full_name" => "Maria Amaral",
     *     "age" => 41,
     *     "childrens" => 2,
     *     "childrens_age"=> [7, 9]
     * ]
     */
    public static function generate($stringJson)

    {
        $jsonObj = json_decode($stringJson);
        $currentDate = date_create("today");
        $birthdate = date_create($jsonObj->birth);
        foreach ($jsonObj->childrens as $key => $kid) {
            $arr[] =  $kid->age;   
        }

        $container =   array("full_name" =>   $jsonObj->name . " " . $jsonObj->lastname,
          "age" => intval(date_diff($currentDate, $birthdate)->format('%y')),
          "childrens" => count($jsonObj->childrens),
          "childrens_age" =>  $arr);

        return $container;
        
       
    }
}
