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

Tambahkan konfigurasi pada file .env seperti berikut:
```
SIASN_SSO_URL=
SIASN_AUTH_URL=
SIASN_USERNAME=
SIASN_PASSWORD=
SIASN_AUTH_KEY=
SIASN_SECRET_KEY=
```
Isi masing-masing data sesuai dengan data yang ada pada SIASN.

## License
SIMPEG LTS is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
