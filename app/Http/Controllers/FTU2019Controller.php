<?php

namespace App\Http\Controllers;

use App\Admin;
use App\MemberFinal;
use App\Question;
use Illuminate\Http\Request;
use App\Candidate;
use App\Mail\NoticeResult;
use App\Mail\ResetPassword;
use App\Model\Member;
use App\Subscribe;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use App\MyValueBinder;
use PHPExcel_Style_NumberFormat;
use App\Challenge;
use App\Mail\RegisterMember;

class FTU2019Controller extends Controller
{
    public $key;
    public $keyQues;
    public $time_out = "17 march 2019";

    public function __construct()
    {
        $this->key = md5("iinvest2019!");
        $this->keyQues = md5("Asdag34@#AS!@#a");
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function homepage(Request $request)
    {
        //Request new candicate
        if (!empty($request->flag) && Auth::check()) {
            if (Auth::user()->status == 1) {
                Auth::logout();
            } else {
                return redirect(route('challenge'));
            }
            return view('2019.pages.home');
        }
        if (Auth::check()) {
            $member = Auth::user();
            return view('2019.pages.home',compact('member'));
        }

        return view('2019.pages.home');
    }

    public function homepage_final() {
        return view('2019.homepage_final');
    }

    /**
     * Du lieu => DB
     */
    public function updateData()
    {
        $files = [
            'vimo.txt',
            'vimo1.txt',
            'sanchungkhoan.txt',
            'iq.txt',
            'taichinh.txt',
            'thucte.txt',
            'kythuat.txt',
        ];

        $i = 1;
        foreach ($files as $file) {
            $questions = file_get_contents('./2019/dethi/'.$file);
            preg_match_all('/(?<questions>Câu.*?\n4..*?\n)/s', $questions, $raw);

            $result = [];
            foreach ($raw["questions"] as $raw_question) {
                $item = [];
                preg_match_all('/Câu.*?:\s(?<question>.*?)(:|\?)/s', $raw_question, $question);
                preg_match_all('/[1-4]\.\s(?<answer>.*?)\n/s', $raw_question, $answer);

                $item["question"] = $question["question"][0];
                $item["answer"] = \GuzzleHttp\json_encode($answer["answer"]);

                if (empty(Question::where('question',$item["question"])->first())) {
                    Question::create([
                        "question" => $item["question"],
                        "answer" => $item["answer"],
                        "type" => $i
                    ]);
                }

                $result[] = $item;
            }
            $i++;
        }


        dd($result);

        //Save json file
        $fp = file_put_contents('./excel/data.json',json_encode($result));

    }

//    public function reshapeData()
//    {
////        $right = [2,2,1,3,3,2,3,3,2,3,2,3,2,1];
////        $right = [2,1,0,3,3,0,3,2,0,1,0,3,1];
////        $right = [2,2,0,3,1,2,0,0,0,0,1];
////        $right = [2,3,1,2,3,2];
////        $right = [2,2,0,3,0,2,3,0,1,3,1,0];
////        $right = [0,1,0,0];
////        $right = [1,2,0,0,1,1,0,0,0,1];
//
//
//        $questions = Question::where('type',7)->get();
////        dd($questions[10], \GuzzleHttp\json_decode($questions[10]["answer"]));
//        $i = 0;
//        foreach ($questions as $question) {
//            $answer = \GuzzleHttp\json_decode($question["answer"], true);
//            $t = Question::find($question->id);
//            $index = $right[$i];
//            $t->true = $answer[$index];
//            array_splice($answer, $index,1);
//            $t->false = \GuzzleHttp\json_encode($answer);
//            $t->save();
//            $i++;
//        }
//    }

    public function rawAns()
    {
        $files = [
            'rawAns.txt',
        ];

        $i = 1;
        foreach ($files as $file) {
            $questions = file_get_contents('./2019/dethi/'.$file);
            preg_match_all('/(?<questions>Câu.*?\n4..*?\n)/s', $questions, $raw);

            $result = [];
            foreach ($raw["questions"] as $raw_question) {
                $item = [];
                preg_match_all('/Câu.*?:\s(?<question>.*?)(:|\?)/s', $raw_question, $question);
                preg_match_all('/[1-4]\.\s(?<answer>.*?)\n/s', $raw_question, $answer);

                if (empty($question["question"][0])) dd($question, $raw_question);
                $item["question"] = $question["question"][0];
                $item["answer"] = \GuzzleHttp\json_encode($answer["answer"]);

                $change = Question::where('question',$item["question"])->first();
                if (!empty($change)) {
                    $change->update([
                        'raw_type' => 1,
                        'raw_answer' => $item['answer']
                    ]);
                }


                $result[] = $item;
            }
            $i++;
        }
        dd($result);
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
                $set['image'] = $sheet[$i]['anh'];
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
        if (Auth::check() && Auth::user()->status == 0 && strtotime("now") <= strtotime($this->time_out)) {
            $record_challenge = Challenge::where('candidate_id', Auth::id())->first();
            $chance = !empty($record_challenge) ? 2 - (int)$record_challenge->chance : 2;
            return view('2019.pages.challenge', compact('chance'));
        } else if (Auth::check() && (Auth::user()->status == 1 || strtotime("now") > strtotime($this->time_out))) {
            $member = Auth::user();
            return view('2019.pages.score', compact('member'));
        }

        return redirect(route('home'));

    }

    /**
     * @return array
     */
    public function getExam() {
        if (Auth::check() && Auth::user()->status == 0 && strtotime("now") <= strtotime($this->time_out)) {
            $data = [];
            $data = array_merge($data, Question::where('type', 1)->inRandomOrder()->take(4)->get()->toArray());
            $data = array_merge($data, Question::where('type', 2)->inRandomOrder()->take(3)->get()->toArray());
            $data = array_merge($data, Question::where('type', 3)->inRandomOrder()->take(3)->get()->toArray());
            $data = array_merge($data, Question::where('type', 4)->inRandomOrder()->take(2)->get()->toArray());
            $data = array_merge($data, Question::where('type', 5)->inRandomOrder()->take(3)->get()->toArray());
            $data = array_merge($data, Question::where('type', 6)->inRandomOrder()->take(2)->get()->toArray());
            $data = array_merge($data, Question::where('type', 7)->inRandomOrder()->take(3)->get()->toArray());

            $data = $this->listQuestion($data);
            $list_question = $data['list_question'];
            $checking = JWT::encode( $data['answer'],$this->key);

            //Tao ban ghi challenge
            $record_challenge = Challenge::where('candidate_id',Auth::id())->first();

            if (!empty($record_challenge) && $record_challenge->status == 0) {
                $record_challenge->chance += 1;
                $record_challenge->chance == 2 ? $record_challenge->status = 1 : $record_challenge->status = 0;
                $record_challenge->questions = \GuzzleHttp\json_encode($list_question);
                $record_challenge->check = $checking;
                $record_challenge->answer = "";
                $record_challenge->save();

                if ($record_challenge->chance == 2) {
                    Auth::user()->status = 1;
                    Auth::user()->save();
                }

            } else if (!empty($record_challenge) && $record_challenge->status == 1) {
                return 0;

            } else {
                $record_challenge = Challenge::create([
                    'candidate_id' => Auth::id(),
                    'questions' => \GuzzleHttp\json_encode($list_question),
                    'check' => $checking,
                    'answer' => '',
                ]);
            }



            return [
                'exam' => $list_question,
                'check' => $checking,
            ];
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function verifyExam(Request $request)
    {
        $params = $request->all();

        $checking = JWT::decode($params['checking'], $this->key, array('HS256'));
        $checking = \GuzzleHttp\json_decode(\GuzzleHttp\json_encode($checking),true);

        $check = [];
        for($i=0; $i<20; $i++) {
            $check[] = $checking[$i][$i];
        }

        unset($params['checking'],$params['_token']);
        $member_answer = $params;


        //Update record challenge
        $record_challenge = Challenge::where('candidate_id', Auth::id())->first();
        $record_challenge->answer = \GuzzleHttp\json_encode($member_answer);
        $record_challenge->save();

        return [];
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
        for($i=0; $i<20; $i++) {
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
        Auth::user()->status = 1;

        //Update record challenge
        $record_challenge = Challenge::where('candidate_id', Auth::id())->first();
        $record_challenge->status = 1;
        $record_challenge->answer = \GuzzleHttp\json_encode($member_answer);
        $record_challenge->save();

        //Mail to notice result
        if ((!empty($member))&&(!empty($member->email))) {
            Mail::to($member->email)->send(new NoticeResult(array(
                'name'=>$member->name,
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
        if (Auth::check() && Auth::user()->status == 1) {
            $member =Auth::user();
            return view('2019.pages.score',compact('member'));
        }
        return redirect(route('home'));
    }




    /**
     * @param $data
     * @return array
     */
    public function listQuestion($data){
        $temp_list_question = $data;
        $final_list_question = [];
        $answer = [];

        //Shuffle array
        shuffle($temp_list_question);

        foreach ($temp_list_question as $key=>$temp_question) {
            $true = $temp_question['true'];


            //Save list question
            $obj_ques['question'] = $temp_question['question'];

            if($temp_question["raw_type"] == 1) {
                $array_answer = \GuzzleHttp\json_decode($temp_question["raw_answer"], true);
            }
            else {
                $array_answer = array_merge([$temp_question['true']],\GuzzleHttp\json_decode($temp_question['false'], true));
                shuffle($array_answer);
            }
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
        return view('2019.pages.doitac');
    }

    public function tongquan()
    {
        return view('2019.pages.tongquan');
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
                return view('administrator.actionstartup2019');
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
            $admin = Admin::find(1)->toArray();
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
                return view('administrator.actionstartup2019');
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
        //Update 23/10/2018
        $allCandidate = MemberFinal::whereNull('deleted_at')
            ->select(['id','name', 'dateOfBirth','email','phone', 'university', 'year', 'created_at'])->get()->toArray();

//        $allCandidate = $this->handleData($allCandidate);
        return response()->json($allCandidate);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function exportExcel()
    {
        Excel::create('Thông tin thí sinh', function($excel) {
            //Update 23/10/2018
            $allCandidate = MemberFinal::whereNull('deleted_at')
                ->select(['id','name',  'dateOfBirth', 'email','phone', 'university', 'year','created_at'])->get()->toArray();
//            $allCandidate = $this->handleData($allCandidate);


            $excel->setTitle('Thông tin thí sinh');
            $column = ['Id','Tên', 'Năm sinh','Email','Số điện thoại','Trường học', 'Năm', "Ngày đăng ký"];

            array_unshift($allCandidate,$column);

            $excel->sheet('DATA', function($sheet)use($allCandidate) {
                $sheet->rows($allCandidate);
            });


        })->store('xlsx', storage_path('/excel'))->download('xlsx');

        return redirect(route('administrator.action.view'));

    }

    /**
     * @param $data
     * @return array
     */
    public function handleData($data)
    {
        $result = [];
        foreach ($data as $m) {
            switch ($m['location']) {
                case 0 :
                    {
                        $m['location'] = "";
                        break;
                    }
                case 1 :
                    {
                        $m['location'] = "Đại học Kinh tế Quốc dân";
                        break;
                    }
                case 2 :
                    {
                        $m['location'] = "Đại học Ngoại thương";
                        break;
                    }
                default:
                    break;
            }

            switch ($m['shift']) {
                case 0 :
                    {
                        $m['shift'] = "";
                        break;
                    }
                case 1 :
                    {
                        $m['shift'] = "Ca 1: 8h00 - 9h30";
                        break;
                    }
                case 2 :
                    {
                        $m['shift'] = "Ca 2: 10h00 - 11h30";
                        break;
                    }
                case 3 :
                    {
                        $m['shift'] = "Ca 3: 14h00 - 15h30";
                        break;
                    }
                case 4 :
                    {
                        $m['shift'] = "Ca 4: 16h00 - 17h30";
                        break;
                    }
                default: break;

            }

            !empty($m["facebook"]) ? $m["facebook"] = self::makeClickableLinks($m["facebook"]) : "";

            $result[] = $m;
        }

        return $result;
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
            $member = Admin::find(1);
            $member->password = $params['new_password'];
            $member->save();

            $result['success'] = 1;
        }
        return $result;
    }


    public function testcase(Request $request)
    {
        if (!empty($request->flag) && Auth::check()) {
            Auth::logout();
            return view('administrator.test');
        }
        if (Auth::check()) {
            $member = Auth::user();
            return view('administrator.test',compact('member'));
        }
        return view('administrator.test');
    }

    public function adminLogout()
    {
        if (session()->has('admin')) {
            session()->put('admin',null);
        }
        return view('administrator.login');
    }


    public static function makeClickableLinks($s) {
        if (!preg_match('/.*?https?.*?/',$s)) {
            $s = 'https://'.$s;
        }

        return '<a href="'.$s.'" target="_blank">Click</a>';
    }

    public function testMail()
    {
        Mail::to("tung91996@gmail.com")->send(new RegisterMember(array(
            'name'=>124214,
            'temp_password' => 12323,
            'email' => 123213
        )));
    }
}
