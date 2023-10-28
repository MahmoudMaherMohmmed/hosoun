<?php

use Carbon\Carbon;

class ZoomHelper
{
    public static function getToken()
    {
        $access_token = null;

        if (Carbon::now()->lessThan(Auth::user()->jwt_token_expires_in)) {
            $access_token = Auth::user()->jwt_token;
        } else {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://zoom.us/oauth/token?grant_type=account_credentials&account_id=I0wTzpEMTOSk6fg74OoTMA',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_HTTPHEADER => array("Authorization: Basic " . base64_encode("b35Gx7GCTxphqLO2Zy6TA:2f5F0tUH4UbwJa63WexDbHbhd0KW6CFf")),
            ]);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($curl);
            curl_close($curl);
            // dump('test');
            // dd($response);
            $zoom_auth = json_decode($response, true);
            if (isset($zoom_auth['token_type']) && $zoom_auth['token_type'] == 'bearer' && isset($zoom_auth['access_token']) && isset($zoom_auth['expires_in'])) {
                Auth::user()->update(['zoom_email' => 'husunacademy@gmail.com', 'jwt_token' => $zoom_auth['access_token'], 'jwt_token_expires_in' => Carbon::now()->addSeconds($zoom_auth['expires_in'])]);

                $access_token = $zoom_auth['access_token'];
                // dd($zoom_auth);

            }
        }

        return $access_token;
    }

}