<?php
/**
 * Class to connect with Ducksboard http://www.ducksboard.com
 * @author César Rodríguez <kesarr@gmail.com>
 */
class duckboard
{
    const API_KEY = 'xn325IdvBu16B3CvmhHkaeHCuhLnOXvXkaEPvx73joGnA7j1TF';

    /**
     * Send information to DuckBoard
     * @param int|string $widgetCode
     * @param int|string|array $value
     * @example curl - v - u APIKEY:x - d '{"delta": 5}' https://push.ducksboard.com/values/235
     * @throws Exception incorrect params
     */
    public static function send($widgetCode, $value)
    {
        $value = self::checkParams($value);
        if (empty($value) !== true) {
            $curlRequest = curl_init('https://push.ducksboard.com/v/' . $widgetCode);
            curl_setopt($curlRequest, CURLOPT_USERPWD, self::API_KEY . ':ignored');
            curl_setopt($curlRequest, CURLOPT_POSTFIELDS, json_encode($value));
            curl_setopt($curlRequest, CURLOPT_POST, 1);
            curl_setopt($curlRequest, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, true);
            curl_exec($curlRequest);
            curl_close($curlRequest);
        } else {
            throw new Exception('incorrect params!');
        }
    }

    /**
     * Validate correct params
     * @param array|int $value
     * @return array
     */
    private static function checkParams($value)
    {
        if (is_numeric($value)) {
            $value = array('value' => $value);
        } else if (is_array($value)) {

        } else {
            $value = '';
        }

        return $value;
    }
}