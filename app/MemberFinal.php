<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberFinal extends Model
{
    protected $table = 'member_final';

    protected $guarded = [];

    /**
     * @param $params
     * @return mixed
     */
    public static function registerMemberFinal($params) {
        $member = MemberFinal::create(array(
            'name' => $params['name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
            'dateOfBirth' => $params['dateOfBirth'],
            'university' => $params['university'],
            'year' => $params['year'],
        ));
        $result['member'] = $member;

        return $result;
    }
}
