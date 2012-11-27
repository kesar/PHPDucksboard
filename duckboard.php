<?php
/**
 * class to connect with Ducksboard http://www.ducksboard.com
 * @author César Rodríguez <kesarr@gmail.com>
 */
class duckboard
{
    const API_KEY = 'xn325IdvBu16B3CvmhHkaeHCuhLnOXvXkaEPvx73joGnA7j1TF';

    /**
     * @param int|string $widgetCode
     * @param int|string|array $value
     * @example curl - v - u APIKEY:x - d '{"delta": 5}' https://push.ducksboard.com/values/235
     */
    public static function send($widgetCode, $value)
    {
        if (is_numeric($value)) {
            $value = array('value' => $value);
        }
        $curlRequest = curl_init('https://push.ducksboard.com/v/' . $widgetCode);
        curl_setopt($curlRequest, CURLOPT_USERPWD, self::API_KEY . ':ignored');
        curl_setopt($curlRequest, CURLOPT_POSTFIELDS, json_encode($value));
        curl_setopt($curlRequest, CURLOPT_POST, 1);
        curl_setopt($curlRequest, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curlRequest);
        curl_close($curlRequest);
    }
}