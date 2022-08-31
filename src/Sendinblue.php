<?php

namespace Concept7\LaravelSendinblue;

use Concept7\LaravelSendinblue\Facades\SendinblueApi;

trait Sendinblue
{
    public function sendinblue(array $config)
    {
        // Mailable needs these attributes, but we're sending emails through Sendinblue with template.
        $this->view([]);
        $this->html('<div></div>');

        // Get template subject

        if (isset($config['template_id'])) {
            $this->subject(SendinblueApi::instance()
                ->getSmtpTemplate($config['template_id'])
                ->getSubject());
        }

        // Add parameters to Mailable
        $this->withSymfonyMessage(function ($message) use ($config) {
            if (isset($config['template_id'])) {
                $message
                    ->getHeaders()
                    ->addTextHeader('templateId', $config['template_id']);
            }

            if (isset($config['params'])) {
                $message
                    ->getHeaders()
                    ->addParameterizedHeader(
                        'params', 'params', $config['params']
                    );
            }
        });

        return $this;
    }
}
