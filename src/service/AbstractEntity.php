<?php

namespace App\Service;

abstract class AbstractEntity
{
    protected static function hydrate($data, $object){

        foreach($data as $field => $value) {

            $fieldArray = explode("_", $field);
            if(isset($fieldArray[1]) && $fieldArray[1] == "id") {
                $managerName = ucfirst($fieldArray[0])."Manager";
                require_once "model/manager/".$managerName.".php";
                $manager = new $managerName();
                $value = $manager->findOneById($value);
            }

            $method = "set".ucfirst($fieldArray[0]); 

            if(method_exists($object, $method)) {
                $object->$method($value);
            }
        }
    }

}