<?php

class Fetch
{
    public static function fetchData($URL) {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $URL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, "MyApp/1.0");
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'cURL error: ' . curl_error($ch);
            }
            curl_close($ch);
        } catch (Exception $e) {
            echo $e;
        } finally {
            return $response;
        }
    }
}
?>