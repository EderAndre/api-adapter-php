<?php
declare(strict_types = 1);
namespace Gov\DpeRS\ApiAdapter\Middleware\Service;

class ApiTools
{

    public function consumeExternalApi($url, $customHeader = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (! is_null($customHeader)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $customHeader);
        }

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($result == "" || $httpCode != 200) {
            $result = [];
            $result = json_encode($result);
        }

        curl_close($ch);
        return [
            'content' => json_decode($result, true),
            'httpCode' => $httpCode
        ];
    }

    public function getWithBearer($url, $method, $bearer)
    {
        $ch = curl_init($url);

        $curl_auth_options = [
            CURLOPT_CUSTOMREQUEST => "$method",
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => [
                $bearer
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        ];
        curl_setopt_array($ch, $curl_auth_options);

        $aud = json_decode(curl_exec($ch));

        if (curl_error($ch)) :
            exit(curl_error($ch));
        endif;

        curl_close($ch);
        return $aud;
    }
}
