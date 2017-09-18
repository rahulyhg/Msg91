<?php
namespace lucky541\Msg91;
/**
 *
 */
class ProcessData
{
    static function dataProcess($url, $data)
    {

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data
            //,CURLOPT_FOLLOWLOCATION => true
        ));

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($ch);

        //Print error if any
        if (curl_errno($ch)) {
            echo 'error: ' . curl_error($ch);
            return curl_error($ch);
        }

        curl_close($ch);

        return $output;
    }
}