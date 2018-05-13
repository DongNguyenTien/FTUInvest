<?php

namespace App\Http\Controllers;

use App\Libraries\callAPI;
use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use DB;

class Round2Controller extends Controller
{
    protected $callApi;

    public function __construct()
    {
        $this->callApi = new callAPI();
    }

    public function subscribe(Request $request)
    {
        DB::beginTransaction();
        try {
            //Validate data
            $params = $request->all();

            $validator = Validator::make($params,[
                'name'=>'required',
                'phone'=>'required',
                'email'=>['required','unique:member','regex:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
                'dateOfBirth' => 'required',
                'university' => 'required',
                'other_university' => 'required_if:university,-1',
                'year' => 'required',
                'other_year' => 'required_if:year,-1'
            ],[
                'name.required'=>'Họ về tên không được để trống',
                'phone.required'=>'Số điện thoại không được để trống',
                'email.required'=>'Họ về tên không được để trống',
                'email.regex' => "Email không đúng định dạng",
                'email.unique' => 'Email này đã được sử dụng',
                'university.required'=>'Trường đại học không được để trống',
                'other_university.required_if'=>'Trường đại học không được để trống123',

                'year.required'=>'Năm học không được để trống',
                'other_year.required_if'=>'Năm học không được để trống',

                'dateOfBirth.required'=>'Ngày sinh không được để trống',
            ]);

            if($validator->fails()){
                return $result = [
                    'success' => 0,
                    'messages' => $this->getMessageErros($validator->errors())
                ];
            }
            //Register
            $params['dateOfBirth'] = Carbon::parse($request->dateOfBirth)->toDateTimeString();

            if ($params["university"] == -1 && !empty($params["other_university"])) {
                $params["university"] = $params["other_university"];
                unset($params["other_university"]);

            } else if($params["university"] == -1 && !empty($params["other_university"])){
                return $result = [
                    "success" => 0,
                    "messages" => "Thông tin về trường đại học sai"
                ];
            } else {
                switch ($params["university"]) {
                    case 1 :
                        $params["university"] = "Đại học Ngoại Thương";
                        break;
                    case 2 :
                        $params["university"] = "Đại học Kinh tế Quốc dân";
                        break;
                    case 3 :
                        $params["university"] = "Đại Học Bách Khoa Hà Nội";
                        break;
                    case 4 :
                        $params["university"] = "Học viện Tài chính";
                        break;
                    case 5 :
                        $params["university"] = "Đại học Quốc Gia Hà Nội";
                        break;
                    case 6 :
                        $params["university"] = "Đại học Thương mại";
                        break;
                    case 7 :
                        $params["university"] = "Đại học Luật Hà Nội";
                        break;

                }
            }

            if ($params["year"] == -1 && !empty($params["other_year"])) {
                $params["year"] = $params["other_year"];
                unset($params["other_year"]);

            } else if($params["year"] == -1 && empty($params["other_year"])) {
                return $result = [
                    "success" => 0,
                    "messages" => "Thông tin về trường năm học sai"
                ];
            }

            $member = Subscribe::subscribe($params);

            if ((!empty($member))&&(!empty($params['email']))) {
                Mail::to($params['email'])->queue(new \App\Mail\Subscribe(array(
                    'name'=>$params['name'],
                )));
            }

            DB::commit();
            return $result = [
                "success" => 1
            ];

        }

        catch(\Exception $ex){
            DB::rollback();
            return $result = [
                "success" => 0,
                "messages" => $ex->getMessage()
            ];

        }
    }

    /**
     * Get message errors
     * @param $errors
     * @return string
     */
    public function getMessageErros($errors){
        $result = array();
        if(!empty($errors)){
            foreach ($errors->getMessages() as $key=>$value){
                $result[] = $value[0];
            }
        }
        return implode('; ',$result);
    }

}
