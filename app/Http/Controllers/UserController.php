<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMember;
use Illuminate\Http\Request;
use App\Model\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Response;
use App\APIReturnHelper;

class UserController extends Controller
{
    public function register ()
    {
        return view('2019.pages.register');
    }

    public function requestRegister(Request $request)
    {
        DB::beginTransaction();
        try {
            //Validate data
            $params = $request->all();
            $validator = Validator::make($params,[
                'name'=>'required',
                'phone'=>'required',
                'email'=>['required','unique:candidates','regex:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
                'dateOfBirth' => 'required',
                'identification' => ['required','unique:candidates'],
//                'facebook' => 'required',
//                'university' => 'required',
//                'course' => 'required',
//                'MSSV' => 'required,
//                'status' => 'required',



            ],[
                'name.required'=>'Họ về tên không được để trống',
                'phone.required'=>'Số điện thoại không được để trống',
                'identification.required' => 'Số chứng minh nhân dân không được để trống',
                'identification.unique' => 'Số chứng minh nhân dân này đã được sử dụng',
                'email.required'=>'Họ về tên không được để trống',
                'email.regex' => "Email không đúng định dạng",
                'email.unique' => 'Email này đã được sử dụng',
//                'university.required'=>'Trường đại học không được để trống',
//                'speciality.required'=>'Ngành học không được để trống',
//                'course.required'=>'Khoá đang theo học không được để trống',
//                'MSSV.required'=>'Mã số sinh viên không được để trống',
//                'facebook.required'=>'Địa chỉ Facebook không được để trống',
                'dateOfBirth.required'=>'Năm sinh không được để trống',
            ]);

            if($validator->fails()){
                return $result = [
                    'success' => 0,
                    'messages' => $this->getMessageErros($validator->errors())
                ];
            }
            //Register
//            $params['dateOfBirth'] = Carbon::parse($request->dateOfBirth)->toDateTimeString();

            //CV
//            $CV_filename = "";
//            if(!empty($params['CV'])) {
//                $CV_filename = Member::addCV($request);
//            }
//
//            $params['CV'] = 'iinvest.test/CV/'.$CV_filename;

            $member = Member::registerMember($params);

            //Send email
            if ((!empty($member))&&(!empty($params['email']))) {
                Mail::to($params['email'])->send(new RegisterMember(array(
                    'name'=>$params['name'],
                    'temp_password' => $member['password']
                )));
            }


            Auth::login($member['member']);


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


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('invest.login');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginPost(Request $request)
    {
        try{
            //Validate data
            $params = $request->all();
            $validator = Validator::make($params,[
//                'phone'=>'required',
                'email'=>['required','regex:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
                'password' => 'required',

            ],[
//                'phone.required'=>'Số điện thoại không được để trống',
                'email.required'=>'Email không được để trống',
                'email.regex' => "Email không đúng định dạng",
                'password.required' => 'Password không được để trống'
            ]);

            if($validator->fails()){
//                return redirect()->back()->withInput()->withErrors($validator->errors());
                $helper = new APIReturnHelper();
                return array(
                    'success' => false,
                    'errors' => $helper->getMessageErrors($validator->errors())
                );
            }



            //Login
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return array(
                    'success' => true,
                );
            }


//            return redirect()->back()->withInput()->withErrors(["Thông tin đăng nhập sai."]);
            return array(
                'success' => false,
                'errors' => "Thông tin đăng nhập sai."
            );

        } catch(\Exception $ex) {
            return redirect()->back()->withInput();
        }
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('home');
    }
}
