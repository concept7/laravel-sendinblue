<?php

namespace Concept7\LaravelSendinblue;

use Concept7\LaravelSendinblue\Facades\SendinblueApi;
use Illuminate\Support\Facades\Mail;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Symfony\Component\Mailer\Bridge\Sendinblue\Transport\SendinblueTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;

class SendinblueServiceProvider extends PackageServiceProvider
{
    public function registeringPackage()
    {
        $this->app->bind('sendinblueapi', function () {
            return new SendinblueApi();
        });
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-sendinblue')
            ->hasConfigFile();
    }

    public function bootingPackage()
    {
        Mail::extend('sendinblue', function () {
            return (new SendinblueTransportFactory)->create(
                new Dsn(
                    'sendinblue+api',
                    'default',
                    config('services.sendinblue.key')
                )
            );
        });
    }
}
