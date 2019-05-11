<?php

namespace App\Model;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Member extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use SoftDeletes, Authenticatable, CanResetPassword;

//    protected $table = "candidates";
    protected $table = 'member_final';
    protected $guarded = [];

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }


    /**
     * @param $params
     * @return array
     */
    public static function registerMember($params)
    {
        //Custom link fb
        if (!empty($params['facebook']) && !preg_match('/^(http:|https:)\/\/?.*/',$params['facebook'])) {
            $params['facebook'] = 'https://'.$params['facebook'];
        }

        $random = mt_rand(100000, 999999);

        $member = Member::create(array(
            'name' => $params['name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
            'password' => $random,
            'dateOfBirth' => $params['dateOfBirth'],
            'university' => $params['university'],
            'speciality' => $params['speciality'],
            'year' => $params['year'],
            'facebook' => $params['facebook'],
            'identification' => $params['identification'],
            'extracurricular' => $params['extracurricular'],
            'prices' => $params['prices'],
            'location' => !empty($params['location']) ? $params['location'] : 0,
            'shift' => !empty($params["shift"])? $params['shift'] : 0,

//            'speciality' => $params['speciality'],
//            'course' => $params['course'],
//            'MSSV' => $params['MSSV'],
//            'CV' => $params['CV'],
//            'status' => 0,
        ));


        $result['member'] = $member;
        $result['password'] = $random;

        return $result;
    }

    /**
     * @param $params
     * @return mixed
     */
    public static function registerMemberFinal($params) {
        //Custom link fb
        $member = Member::create(array(
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
    /**
     * @param $request
     * @return string
     */
    public static function addCV($request)
    {
        $CV = "";
        if (is_uploaded_file($request->file('CV'))) {
            $CV = $request->file('CV')->getClientOriginalName();
            $request->CV->move('CV', $CV);
        }
        return $CV;
    }
}
