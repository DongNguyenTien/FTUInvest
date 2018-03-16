<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_IOFactory;
use PHPExcel_Worksheet_MemoryDrawing;


class InvestController extends Controller
{
    public $excel;

    public function __construct()
    {

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


    public function challenge()
    {
        return view('invest.challenge');
    }
}
