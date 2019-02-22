<?php
/**
 * Created by PhpStorm.
 * User: nguyentiendong
 * Date: 10/23/18
 * Time: 21:25
 */

namespace App;


class APIReturnHelper
{
    const RESULT_SUCCESS = 1;
    const RESULT_ERROR = 0;
    const RESULT_TOKEN_EXPITE = 99;

    public $result = 0;// 1 => success; 0 => Error
    public $current_time = 0;
    public $message = '';
    public $data = [];

    /**
     * Get message errors
     * @param $errors
     * @return string
     */
    public function getMessageErrors($errors){
        $result = array();
        if(!empty($errors)){
            foreach ($errors->getMessages() as $key=>$value){
                $result[] = $value[0];
            }
        }
        return implode('; ',$result);
    }
}