<?php


class View_Util
{
    public static function fieldIsNotEmpty($fields = array()){
        foreach ($fields as $field){
            if (!isset($field) or (isset($field) and trim($field) == '')){
                return false;
            }
        }
        return true;
    }
}