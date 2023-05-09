<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://lighthinkstudio.com/assets/images/logo/lighthink_indigo.png" width="220"></a></p>

## Tentang Kami

SIASN adalah sebuah package untuk memudahkan konesi dan integrasi SIASN API dalam mengembangkan sistem informasi kepegawaian menggunakan laravel.

## Instalasi

```
composer require lighthinkstudio/siasn
```

```
php artisan vendor:publish --provider="Lighthinkstudio\Siasn\SiasnServiceProvider"
```

## Konfigurasi

Tambahkan konfigurasi pada file .env seperti berikut:
```
SIASN_SSO_URL=ISI_DENGAN_URL_SSO_SIASN
SIASN_AUTH_URL=ISI_DENGAN_URL_AUTH_SIASN
SIASN_USERNAME=ISI_DENGAN_USERNAME_SIASN
SIASN_PASSWORD=ISI_DENGAN_PASSWORD_SIASN
SIASN_AUTH_KEY=ISI_DENGAN_AUTH_CONSUMER_KEY
SIASN_SECRET_KEY=ISI_DENGAN_AUTH_SECRET_KEY
```

## Penggunaan

```
<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Lighthinkstudio\Siasn\Siasn;

class ContohController extends Controller
{
    public function index(Client $http, Siasn $siasn)
    {
        $get_data = $http->get('ISI_DENGEN_URL_RESOURCES_SIASN_API', $siasn->connect());

        $data_utama =  json_decode((string) $get_data->getBody($siasn->auth())->getContents(), true);
        dd($data_utama);
    }
}

```


## License
SIASN is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
