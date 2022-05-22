<?php
//REFERENCE: https://gist.github.com/nasrulhazim/f3ca4c231216a491b423e06e069473ae
namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('base64', function ($attribute, $value, $parameters, $validator) {
            if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $value)) {
                return true;
            } else {
                return false;
            }
        });
        ///^([^0-9]*)$/
        Validator::extend('HumanName', function ($attribute, $value, $parameters, $validator) {
            if (preg_match('%/^([^0-9]*)$/%', $value)) {
                return true;
            } else {
                return false;
            }
        });

        Validator::extend('E.164.PhoneNumber', function ($attribute, $value, $parameters, $validator) {
            if (preg_match('%^\+[1-9]\d{1,14}$%', $value)) {
                return true;
            } else {
                return false;
            }
        });

        /*
        data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO
        9TXL0Y4OHwAAAABJRU5ErkJggg==
         */
        Validator::extend('base64image', function ($attribute, $value, $parameters, $validator) {
            $explode = explode(',', $value);

            //if the array length is less than 2, the base64 is invalid
            if(sizeof($explode) < 2){
                return false;
            }

            $allow = ['png', 'jpg'];
            $format = str_replace(
                [
                    'data:image/',
                    ';',
                    'base64',
                ],
                [
                    '', '', ''
                ],
                $explode[0]
            );

            $explode[1]  = str_replace(
                [
                    ' '
                ],
                [
                    ''
                ],
                $explode[1]
            );

            //png
            // iVBORw0KGgoAAAANSUhEUgAAA

            // check file format
            if (!in_array($format, $allow)) {
                return false;
            }

            // check base64 format
            if (!preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $explode[1])) {
                return false;
            }

            return true;
        });

        Validator::extend('is_png_jpg', function ($attribute, $value, $params, $validator) {
            $image = base64_decode($value);
            $f = finfo_open();
            $result = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
            $console = 'console.log(' . json_encode($result) . ');';
            $console = sprintf('<script>%s</script>', $console);
            echo $console;
            return $result == 'image/png' || $result == 'image/jpg';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
