<?php

namespace App\Http\Controllers;

use App\APIReturnHelper;
use App\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FTU2Controller extends Controller
{
    public function tongquan()
    {
        return view('ftu2.tongquan');
    }

    public function homepage()
    {
        return view('ftu2.homepage');
    }

    public function register(Request $request)
    {
        $params = $request->all();
        $result = new APIReturnHelper();

        if (!empty($params)) {

            $params["is_have_friend"] = !empty($params["is_have_friend"]) ? 1 : 0;
            $validate = Validator::make($params, [
               'name' => 'required',
                'identification' => 'required',
                'email' => 'required|email|unique:candidates',
                'phone' => 'required|unique:candidates',
                'status' => 'required|integer',
                'work_place' => 'required',
                'facebook' => 'required',
                'payment_type' => 'required|integer',
                'friend_name' => 'required_if:is_have_friend,1',
                'friend_email' => 'required_if:is_have_friend,1',
                'friend_phone' => 'required_if:is_have_friend,1',
                'friend_identification' => 'required_if:is_have_friend,1',
                'friend_facebook' => 'required_if:is_have_friend,1',

            ]);

            if ($validate->fails()) {
                $result->message = $result->getMessageErros($validate->errors());
                return response()->json($result);
            }

            $candidate = Candidate::create([
               'name' => $params["name"],
               'identification' => $params["identification"],
               'phone' => $params["phone"],
               'email' => $params["email"],
               'status' => $params["status"],
               'work_place' => $params["work_place"],
               'facebook' => $params["facebook"],
               'payment_type' => $params["payment_type"],
               'level' => $params["level"],
               'is_sponsor' => $params["is_sponsor"],
               'aspiration' => $params["aspiration"],
               'is_have_friend' => $params["is_have_friend"],
               'friend_name' => $params["friend_name"],
               'friend_phone' => $params["friend_phone"],
               'friend_email' => $params["friend_email"],
                'friend_facebook' => $params["friend_facebook"],
                'friend_identification' => $params["friend_identification"]
            ]);

            if (!empty($candidate)) {
                $result->result = 1;
                $result->message = "Chúc mừng, bạn đã đăng ký thành công";
            }

            return response()->json($result);



        } else {
            return response()->json($result);
        }
    }
}
