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

    protected $table = "member";
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
        if (!preg_match('/^(http:|https:)\/\/?.*/',$params['facebook'])) {
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
            'course' => $params['course'],
            'MSSV' => $params['MSSV'],
            'facebook' => $params['facebook'],
            'CV' => $params['CV'],
            'identification' => $params['identification'],
            'status' => 0,
        ));


        $result['member'] = $member;
        $result['password'] = $random;

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
