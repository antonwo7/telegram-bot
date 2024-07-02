<?php

class Request
{
    public static function get($url, $data = [], $header = [])
    {
        return self::connect($url, 'get', $data, $header);
    }

    public static function post($url, $data = [], $header = [])
    {
        return self::connect($url, 'post', $data, $header);
    }

    public static function postArray($url, $data = [], $header = [])
    {
        return self::connect($url, 'post', $data, $header, false);
    }

    public static function put($url, $data = [], $header = [])
    {
        return self::connect($url, 'put', $data, $header);
    }

    private static function connect($url, $method = 'get', $data = [], $header = [], $json = true)
    {
        $method = mb_strtolower($method);

        if ($method == 'get' && !empty($data))
            $url .= '?' . http_build_query($data);

        $request = curl_init();

        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

        if ($method == 'post'){
            if($json){
                $data = json_encode($data);
            }
            curl_setopt($request, CURLOPT_POSTFIELDS, $data);
            curl_setopt($request, CURLOPT_POST, true);
        }

        if ($method == 'put'){
            curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($request, CURLOPT_CUSTOMREQUEST, "PUT");
        }

        if($json){
            $header = array_merge($header, ['Content-Type: application/json']);
        }

        curl_setopt($request, CURLOPT_HTTPHEADER, $header);

        $result = curl_exec($request);

        $httpCode = curl_getinfo($request, CURLINFO_HTTP_CODE);

        $result_decoded = json_decode($result, 1);

        if($result_decoded){
            return array_merge([ 'code' => $httpCode ], $result_decoded);
        }

        return [ 'code' => $httpCode, 'result' => $result ];
    }

    public static function po($url, $data = [], $header = [])
    {
        $request = curl_init();

        curl_setopt_array($request, [
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
        //    CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $data
        ]);

        $result = curl_exec($request);

        $httpCode = curl_getinfo($request, CURLINFO_HTTP_CODE);

        $result_decoded = json_decode($result, 1);

        if($result_decoded){
            return array_merge([ 'code' => $httpCode ], $result_decoded);
        }

        return [ 'code' => $httpCode, 'result' => $result ];
    }
}