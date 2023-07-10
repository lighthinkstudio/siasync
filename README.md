<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://lighthinkstudio.com/assets/images/logo/lighthink_indigo.png" width="220"></a></p>

## SIASYNC - Library Konfigurasi API SIASN

SIASYNC adalah sebuah library yang berfungsi untuk memudahkan proses pengelolaan konfigurasi koneksi dalam mengintegrasikan data SIASN dengan SIMPEG(Sistem Informasi Kepegawaian) menggunakan SIASN API pada masing-masing daerah/ wilayah menggunakan Framework Laravel.

## Instalasi

```
composer require lighthinkstudio/siasync
```

```
php artisan vendor:publish --provider="Lighthinkstudio\Siasync\SiasyncServiceProvider"
```

## Konfigurasi

Tambahkan konfigurasi pada file .env seperti berikut:
```
SIASYNC_SSO_URL=
SIASYNC_AUTH_URL=
SIASYNC_USERNAME=
SIASYNC_PASSWORD=
SIASYNC_AUTH_KEY=
SIASYNC_SECRET_KEY=
```

## Penggunaan

```
<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Lighthinkstudio\Siasync\Siasync;

class ContohController extends Controller
{
    public function index(Client $http, Siasync $siasync)
    {
        $request = $http->get('ISI_DENGEN_URL_SIASN_API_RESOURCES', $siasync->connect());

        $response =  json_decode((string) $request->getBody($siasync->auth())->getContents(), true);
        dd($response);
    }
}

```


## License
SIASYNC is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
