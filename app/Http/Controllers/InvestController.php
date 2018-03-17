<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Config;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_IOFactory;
use PHPExcel_Worksheet_MemoryDrawing;


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
    public function homepage()
    {
//        $data = file_get_contents('./excel/data.json');
//        $data = json_decode($data,true);

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

        //Check null lien tiep


        for ($i = 0; $i < $count; $i++) {
            if ($i == $j*$numberSet - 1 + $j) {
                $j++;
                continue;
            } else {
                $set['question'] = $sheet[$i]['cau_hoi'];
                $set['true'] = $sheet[$i]['dung'];
                $set['false1'] = $sheet[$i]['sai1'];
                $set['false2'] = $sheet[$i]['sai2'];
                $set['false3'] = $sheet[$i]['sai3'];

                $result['set-'.$j][] = $set;
            }
        }

        return $result;
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

                $list_question = $data['list_question'];

                $checking = JWT::encode( $data['answer'],$this->key);

                return view('invest.challenge',compact('list_question','checking'));
        }

        return redirect(route('home'));

    }

    public function checkResult(Request $request)
    {
        $params = $request->all();


        $checking = JWT::decode($params['checking'],$this->key, array('HS256'));

        unset($params['checking']);
        $member_answer = $params;


        //check answer
        $difference = array_diff_assoc((array)$checking,$member_answer);

        //Member

        return view('invest.score',compact('difference'));



    }
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
}

