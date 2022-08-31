<?php

namespace Concept7\LaravelSendinblue\Facades;

use GuzzleHttp\Client;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Configuration;

class SendinblueApi
{
    protected static function getFacadeAccessor()
    {
        return 'sendinblueapi';
    }

    public static function instance()
    {
        $configuration = Configuration::getDefaultConfiguration()->setApiKey('api-key', config('services.sendinblue.key'));

        return new TransactionalEmailsApi(
            new Client(),
            $configuration
        );
    }
}
