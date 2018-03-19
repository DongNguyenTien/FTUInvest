<?php

namespace App\Http\Controllers;

use App\Mail\NoticeResult;
use App\Mail\ResetPassword;
use App\Model\Member;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use App\MyValueBinder;
use PHPExcel_Style_NumberFormat;


class InvestController extends Controller
{
    public $key;

    public function __construct()
    {
        $this->key = md5("iinvest2018");
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function homepage(Request $request)
    {
//        $data = file_get_contents('./excel/data.json');
//        $data = json_decode($data,true);
//        dd($data);
        //Request new candicate
        if (!empty($request->flag) && Auth::check()) {
            Auth::logout();
            return view('invest.home');
        }
        if (Auth::check()) {
            $member = Auth::user();
            return view('invest.home',compact('member'));
        }
        return view('invest.home');
    }

    /**
     *
     */
    public function updateData()
    {
        $result = [];

        Excel::load(public_path('/excel/test.xlsx'),function($reader)use(&$result){


            $reader->each(function($sheet)use(&$result) {
                $result[$sheet->getTitle()] = [];
                $title = $sheet->getTitle();


                if ($title == "Chứng khoán") {
                    $result[$title] = $this->dataSheet($sheet->toArray(),10);
                } else {
                    $result[$title] = $this->dataSheet($sheet->toArray(),5);
                }


            });

        });

        //Save json file
        $fp = file_put_contents('./excel/data.json',json_encode($result));

    }

    /**
     * @param $sheet
     * @param $numberSet
     * @return array
     */
    public function dataSheet($sheet,$numberSet)
    {

        $result = [];
        $count = count($sheet);
        $j = 1;

        for ($i = 0; $i < $count; $i++) {
            if ($i == $j*$numberSet - 1 + $j) {
                $j++;
                continue;
            } else {
                $set['question'] = $sheet[$i]['cau_hoi'];
                $set['true'] = $this->checkPercentage($sheet[$i]['dung']);
                $set['false1'] = $this->checkPercentage($sheet[$i]['sai1']);
                $set['false2'] = $this->checkPercentage($sheet[$i]['sai2']);
                $set['false3'] = $this->checkPercentage($sheet[$i]['sai3']);

                $result['set-'.$j][] = $set;
            }
        }

        return $result;
    }

    public function checkPercentage($cell)
    {
        if (preg_match('/".+?%"/',$cell)) {
            return str_replace('"','',$cell);
        }

        return $cell;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function challenge()
    {
        if (Auth::check() && Auth::user()->status == 0) {

                $data = file_get_contents('./excel/data.json');
                $data = json_decode($data,true);
                $data = $this->listQuestion($data);

                $list_question = \GuzzleHttp\json_encode($data['list_question']);

                $checking = JWT::encode( $data['answer'],$this->key);

                return view('invest.challenge',compact('list_question','checking'));
        }

        return redirect(route('home'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkResult(Request $request)
    {
        $params = $request->all();

        $checking = JWT::decode($params['checking'],$this->key, array('HS256'));
        $checking = \GuzzleHttp\json_decode(\GuzzleHttp\json_encode($checking),true);

        $check = [];
        for($i=0; $i<40; $i++) {
            $check[] = $checking[$i][$i];
        }

        unset($params['checking'],$params['_token']);
        $member_answer = $params;



        //check answer
        $correct = count(array_intersect_assoc($check,$member_answer));


        //Member
        $member = Member::find(Auth::id());
        $member->score = $correct;
        $member->status = 1;
        $member->save();

        //Update auth
        Auth::user()->score = $correct;
        Auth::user()->status = 1;

        //Mail to notice result
        if ((!empty($member))&&(!empty($member->email))) {
            Mail::to($member->email)->queue(new NoticeResult(array(
                'name'=>$member->name,
                'score' => $member->score
            )));
        }

        return redirect()->route('show_result');

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResult()
    {
        //Member
        if (Auth::check()) {
            $member =Auth::user();
            return view('invest.score',compact('member'));
        }
        return redirect(route('home'));
    }




    /**
     * @param $data
     * @return array
     */
    public function listQuestion($data){
        $temp_list_question = [];
        $final_list_question = [];
        $answer = [];


        foreach ($data as $sheet) {
            $index_set_random = array_rand($sheet);
            $temp_list_question = array_merge($temp_list_question,$sheet[$index_set_random]);
        }

        //Shuffle array
        shuffle($temp_list_question);

        foreach ($temp_list_question as $key=>$temp_question) {
            $true = $temp_question['true'];

            $array_answer = [$temp_question['true'],$temp_question['false1'],$temp_question['false2'],$temp_question['false3']];

            //Save list question
            $obj_ques['question'] = $temp_question['question'];
            shuffle($array_answer);
            $obj_ques['answer'] = $array_answer;
            array_push($final_list_question,$obj_ques);


            //Save answer
            array_push($answer,[
                $key => array_search($true,$obj_ques['answer'])
            ]);

        }

        return [
            'list_question' => $final_list_question,
            'answer' => $answer
        ];

    }

    public function doitac()
    {
        return view('invest.doitac');
    }

    public function tongquan()
    {
        return view('invest.tongquan');
    }




//    Administrator

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function administrator()
    {
        if (session()->has('admin')) {

            $admin_session = \GuzzleHttp\json_decode(session('admin'),true);

            if ($admin_session['check'] == md5(date('d/m/Y').$admin_session['admin'])) {
                return view('administrator.action');
            }
        }
        return view('administrator.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function administratorAction(Request $request)
    {
        $params = $request->all();
        if (!empty($params)) {
            $admin = Member::find(1)->toArray();
            if ($params['name'] == "administrator" && Hash::check($params['password'],$admin['password'])) {
                $admin_session = [
                    'admin' => $admin['name'],
                    'check' => md5(date('d/m/Y').$admin['name'])
                ];
                session()->put('admin',\GuzzleHttp\json_encode($admin_session));

                return redirect(route('administrator.action.view'));
            }
        }
        return redirect(route('administrator.login'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewAdminAction()
    {
        if (session()->has('admin')) {

            $admin_session = \GuzzleHttp\json_decode(session('admin'),true);

            if ($admin_session['check'] == md5(date('d/m/Y').$admin_session['admin'])) {
                return view('administrator.action');
            }
        }
        return view('administrator.login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resetPassword()
    {
        return view('administrator.reset');
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function resetPasswordPost(Request $request)
    {
        $params = $request->all();
        $admin = Member::find(1);

        if ($params['email'] == $admin->email) {
            $temp_pass = mt_rand(100000, 999999);
            $admin->password = $temp_pass;
            $admin->save();

            Mail::to($admin->email)->queue(new ResetPassword(array(
                'name' => $admin->email,
                'temp_password' => $temp_pass
            )));

            return redirect(route('administrator.login'))->with('messages', 'Kiểm tra mail của bạn để biết mật khẩu mới');
        }

        return redirect()->back()->with('errors','Email sai');

    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getListCandicate()
    {
        $allCandicate = Member::where('id','!=',1)
            ->select(['id','name','dateOfBirth','email','phone','identification','score','university','speciality','course','CV','facebook'])->get();

        return response()->json($allCandicate->toArray());
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function exportExcel()
    {
        Excel::create('Thông tin thí sinh', function($excel) {
            $allCandicate = Member::where('id','!=',1)
                ->select(['id','name','dateOfBirth','email','phone','identification','score','university','speciality','course','CV','facebook'])
                ->get()->toArray();


            $excel->setTitle('Thông tin thí sinh');
            $column = ['id','Tên thí sinh','Ngày tháng năm sinh','Email','Số điện thoại','Số chứng minh nhân dân','Điểm thi','Trường đại học','Chuyên ngành','Khoá','CV','Facebook'];
            array_unshift($allCandicate,$column);


            $excel->sheet('DATA', function($sheet)use($allCandicate) {
                $sheet->rows($allCandicate);
            });


        })->store('xlsx', storage_path('/excel'))->download('xlsx');

        return redirect(route('administrator.action.view'));

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function changePassword(Request $request)
    {
        $params = $request->all();
        $result['success'] = 0;

        if (!empty($params['new_password'])) {
            $member = Member::find(1);
            $member->password = $params['new_password'];
            $member->save();

            $result['success'] = 1;
        }
        return $result;
    }

}

