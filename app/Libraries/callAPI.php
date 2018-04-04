<?php

namespace App\Libraries;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class callAPI
{
    protected $url;

    public function __construct()
    {
        $this->url = env('API_URL');
    }

    protected function getApi($uri, $params = [], $method = '')
    {
        try {
            $client = new Client();

            $url = $this->url.$uri;


            switch ($method) {
                case 'post':

                    $res = $client->post($url, $params);

                    break;
                case 'get':
                    $res = $client->get($url.'?'.http_build_query($params), array('form_params' => $params));
                    break;
            }

            if (isset($res)) {
                return $res;
            } else {
                return false;
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());

            return false;
        }
    }


    protected function getApiData($uri, $param = array())
    {
        try {
            $method='get';
            $res = $this->getApi($uri, $param, $method);



            if ($res) {
                $items = $res->getBody()->getContents();
                $items = \GuzzleHttp\json_decode($items,true);

                $result = $items;

                return $result;

            }
            else return null;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());

            return array();
        }
    }


    public function getDataFromApi($uri,$params = [])
    {


        $result= $this->getApiData($uri,$params);

        if(!empty($result)){
            return $result;
        }
        else return [];
    }




}
