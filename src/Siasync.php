<?php

namespace Lighthinkstudio\Siasync;

use GuzzleHttp\Client;

class Siasync
{
    // Sso
    public function sso()
    {
        $http = new Client;

        $sso = $http->post(config('siasync.siasync_sso_url', 'siasync_sso_url'), [
            'form_params' => [
                'client_id'     => config('siasync.siasync_client_id', 'siasync_client_id'),
                'username'      => config('siasync.siasync_username', 'siasync_username'),
                'password'      => config('siasync.siasync_password', 'siasync_password'),
                'grant_type'    => 'password',
            ],
        ]);

        $sso = json_decode((string) $sso->getBody()->getContents(), true);

        return $sso['access_token'];
    }

    public function auth()
    {
        $http = new Client;

        $auth = $http->post(config('siasync.siasync_auth_url', 'siasync_auth_url'), [
                            'auth' => [
                                config('siasync.siasync_auth_key', 'siasync_auth_key'),
                                config('siasync.siasync_secret_key', 'siasync_secret_key')
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
        $siasync  = new Siasync();

        return [
            'headers' => [
                'Accept-Type'   => 'application/json',
                'Auth'          => 'Bearer '. $siasync->sso(),
                'Authorization' => 'Bearer '. $siasync->auth(),
            ]
        ];
    }
}
