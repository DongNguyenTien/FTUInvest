<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = "subscribe";
    protected $guarded = [];


    public static function subscribe($params)
    {
        $member = Subscribe::create(array(
            'name' => $params['name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
//            'password' => $random,
            'dateOfBirth' => $params['dateOfBirth'],
            'university' => $params['university'],
            'year' => $params['year'],
            'desire' => $params['desire'],
            'message' => $params['message'],
        ));


        $result['member'] = $member;

        return $result;
    }
}
