<?php

namespace Lighthinkstudio\Siasn;

use GuzzleHttp\Client;

class Siasn
{
    // Sso
    public function sso()
    {
        $http = new Client;

        $sso = $http->post(config('siasn.siasn_sso_url', 'siasn_sso_url'), [
            'form_params' => [
                'client_id'     => 'developer',
                'username'      => config('siasn.siasn_username', 'siasn_username'),
                'password'      => config('siasn.siasn_password', 'siasn_password'),
                'grant_type'    => 'password',
            ],
        ]);

        $sso = json_decode((string) $sso->getBody()->getContents(), true);

        return $sso['access_token'];
    }

    public function auth()
    {
        $http = new Client;

        $auth = $http->post(config('siasn.siasn_auth_url', 'siasn_auth_url'), [
                            'auth' => [
                                config('siasn.siasn_auth_key', 'siasn_auth_key'),
                                config('siasn.siasn_secret_key', 'siasn_secret_key')
                            ],
                            'form_params' => [
                                'grant_type'    => 'client_credentials',
                            ],
                        ]);

        $auth = json_decode((string) $auth->getBody(), true);

        return $auth['access_token'];
    }

    public static function connect()
    {
        $siasn  = new Siasn();

        return [
            'headers' => [
                'Accept-Type'   => 'application/json',
                'Auth'          => 'Bearer '. $siasn->sso(),
                'Authorization' => 'Bearer '. $siasn->auth(),
            ]
        ];
    }
}
