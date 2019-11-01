<?php

namespace App\Http\Controllers;

use App\APIReturnHelper;
use App\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class StartupController extends Controller
{
    public function tongquan()
    {
        return view('startup2019.tongquan2');
    }

    public function doitac()
    {
        return view('startup2019.pages.doitac');
    }

    public function homepage()
    {
        return view('startup2019.home');
    }

    public function register_final() {
        return view('startup2019.pages.register_final');
    }

    public function registerConfirm() {
        return view('startup2019.pages.register_confirm');
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
                'who' => 'required',
                'email' => 'required|email|unique:candidates',
                'phone' => 'required|unique:candidates',
                'work_place' => 'required',
                'facebook' => 'required',
                'dong_tien' => 'required|integer',
                'trinh_do' => 'required|integer',
                'dau_tu_chua' => 'required|integer',
//                'mong_muon' => 'required',
//                'fr_name' => 'required_if:is_have_friend,1',
//                'fr_email' => 'required_if:is_have_friend,1',
//                'fr_phone' => 'required_if:is_have_friend,1',
//                'fr_identification' => 'required_if:is_have_friend,1',
//                'fr_facebook' => 'required_if:is_have_friend,1',
            ]);

            if ($validate->fails()) {
                $result->message = $result->getMessageErros($validate->errors());
                return response()->json($result);
            }

            $candidate = Candidate::create([
                'name' => $params["name"],
                'identification' => $params["identification"],
                'who' => $params['who'],
                'phone' => $params["phone"],
                'email' => $params["email"],
                'work_place' => $params["work_place"],
                'facebook' => $params["facebook"],
                'dong_tien' => $params["dong_tien"],
                'trinh_do' => $params["trinh_do"],
                'dau_tu_chua' => $params["dau_tu_chua"],
                'mong_muon' => $params["mong_muon"],
//                'is_have_friend' => $params["is_have_friend"],
                'fr_name' => $params["fr_name"],
                'fr_phone' => $params["fr_phone"],
                'fr_email' => $params["fr_email"],
                'fr_facebook' => $params["fr_facebook"],
                'fr_identification' => $params["fr_identification"]
            ]);

            if (!empty($candidate)) {
                $result->result = 1;
                $result->message = "Chúc mừng, bạn đã đăng ký thành công";
            }

            return redirect(route('register-confirm'));



        } else {
            return response()->json($result);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getListCandicate()
    {
//        $allCandicate = Member::where('id','!=',1)
//            ->select(['id','name','dateOfBirth','email','phone','identification','score','university','speciality','course','CV','facebook'])->get();

//        $members = Subscribe::whereNull('deleted_at')
//            ->select(["id",'name',"dateOfBirth","email","phone","university","year","desire","message"])->get();

        //Update 23/10/2018
        $allCandidate = Candidate::whereNull('deleted_at')
            ->select(['id','name','who', 'identification', 'email','phone','work_place','facebook','trinh_do','dong_tien','dau_tu_chua','mong_muon', 'fr_name','fr_phone','fr_email','fr_identification','fr_facebook','created_at'])->get()->toArray();

        $allCandidate = $this->handleData($allCandidate);
        return response()->json($allCandidate);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function exportExcel()
    {
        Excel::create('Thông tin thí sinh', function($excel) {
//            $allCandicate = Member::where('id','!=',1)
//                ->select(['id','name','dateOfBirth','email','phone','identification','score','university','speciality','course','CV','facebook','created_at','challenge_at'])
//                ->get()->toArray();
//
//
//            $excel->setTitle('Thông tin thí sinh');
//            $column = ['id','Tên thí sinh','Ngày tháng năm sinh','Email','Số điện thoại','Số chứng minh nhân dân','Điểm thi','Trường đại học','Chuyên ngành','Khoá','CV','Facebook','Thời điểm đăng ký','Thời điểm nộp bài'];
//            array_unshift($allCandicate,$column);

//            $allCandicate = Subscribe::whereNull('deleted_at')
//                ->select(["id",'name',"dateOfBirth","email","phone","university","year","desire","message","created_at"])->get()->toArray();

            //Update 23/10/2018
            $allCandidate = Candidate::whereNull('deleted_at')
                ->select(['id','name','who', 'identification', 'email','phone','work_place','facebook','trinh_do','dong_tien','dau_tu_chua','mong_muon', 'fr_name','fr_phone','fr_email','fr_identification','fr_facebook','created_at'])->get()->toArray();
            $allCandidate = $this->handleData($allCandidate);


            $excel->setTitle('Thông tin thí sinh');
            $column = ['Id','Tên','Bạn là','Số CMND','Email','Số điện thoại','Nơi làm việc', 'Facebook','Trình độ','Thanh toán',"Đầu tư chưa","Mong muốn","Tên của bạn","SDT của bạn","Email của bạn", "Số CMND của bạn", "Facebook của bạn", "Ngày đăng ký"];

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
            switch ($m['who']) {
                case 1 :
                    {
                        $m['who'] = "Sinh viên năm nhất";
                        break;
                    }
                case 2 :
                    {
                        $m['who'] = "Sinh viên năm 2";
                        break;
                    }
                case 3 :
                    {
                        $m['who'] = "Sinh viên năm 3";
                        break;
                    }
                case 4 :
                    {
                        $m['who'] = "Sinh viên năm 4";
                        break;
                    }
                case 5 :
                    {
                        $m['who'] = "Đã đi làm";
                        break;
                    }
                default:
                    break;
            }

            switch ($m['dong_tien']) {
                case 1 :
                    {
                        $m['dong_tien'] = "Offline";
                        break;
                    }
                case 2 :
                    {
                        $m['dong_tien'] = "Online";
                        break;
                    }

                default: break;
            }

            switch ($m['trinh_do']) {
                case 1 :
                    {
                        $m['trinh_do'] = "Chưa biết";
                        break;
                    }
                case 2 :
                    {
                        $m['trinh_do'] = "Biết một vài kiến thức cơ bản";
                        break;
                    }
                case 3 :
                    {
                        $m['trinh_do'] = "Kiến thức cơ bản ổn";
                        break;
                    }

                default: break;

            }
            switch ($m['dau_tu_chua']) {
                case 1 :
                    {
                        $m['dau_tu_chua'] = "Chưa";
                        break;
                    }
                case 2 :
                    {
                        $m['dau_tu_chua'] = "Có đầu tư theo yêu thích";
                        break;
                    }
                case 3 :
                    {
                        $m['dau_tu_chua'] = "Có đầu tư bài bản";
                        break;
                    }

                default: break;

            }

            !empty($m["facebook"]) ? $m["facebook"] = self::makeClickableLinks($m["facebook"]) : "";
            !empty($m["fr_facebook"]) ? $m["fr_facebook"] = self::makeClickableLinks($m["fr_facebook"]) : "";

            $result[] = $m;
        }

        return $result;
    }

    public static function makeClickableLinks($s) {
        if (!preg_match('/.*?https?.*?/',$s)) {
            $s = 'https://'.$s;
        }

        return '<a href="'.$s.'" target="_blank">Click</a>';
    }
}
