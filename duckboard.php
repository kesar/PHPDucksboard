<?php
/**
 * class to connect with Ducksboard http://www.ducksboard.com
 */

class duckboard
{
    const API_KEY = 'xn325IdvBu16B3CvmhHkaeHCuhLnOXvXkaEPvx73joGnA7j1TF';

    /**
     * @param int|string $widgetCode
     * @param int|string $value
     * @param int|null $delta
     * @param string|null $timestamp
     * @example curl - v - u APIKEY:x - d '{"delta": 5}' https://push.ducksboard.com/values/235
     */
    public static function send($widgetCode, $value, $delta = null, $timestamp = null)
    {
        $curlRequest = curl_init('https://push.ducksboard.com/v/' . $widgetCode);
        curl_setopt($curlRequest, CURLOPT_USERPWD, self::API_KEY . ':ignored');
        curl_setopt($curlRequest, CURLOPT_POSTFIELDS, json_encode(array('value' => $value)));
        curl_setopt($curlRequest, CURLOPT_POST, 1);
        curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curlRequest);
    }
}

duckboard::send('test1', 7);
duckboard::send('test2', 5);