# laravel-sendinblue

This project is created to simplify sending transactional emails through Sendinblue using Laravel Mailables, [Symfony/sendinblue-mailer](https://github.com/symfony/sendinblue-mailer) and [Sendinblue API V3 PHP library](https://github.com/sendinblue/APIv3-php-library).

## Install using Composer

```
composer require concept7/laravel-sendinblue
```

## Configuration

### Step 1

Add the following service to config/services.php.

```
'sendinblue' => [
     'key' => 'xxx-xxx-xxx-xxx',
     'sender_name' => 'Concept7',
     'sender_email' => 'sendinblue@example.com',
 ],
```

### Step 2

Add the following maildriver to config/mail.php in the ```mailers``` array.

```
'sendinblue' => [
     'transport' => 'sendinblue',
],
```

## Usage

Create a new Mailable using ```php artisan make:mail``` and add the ```Sendinblue``` trait to the Mailable. Next, add ```->sendinblue([])``` to the Mailable instance and you're done. 

```php
use Concept7\LaravelSendinblue\Sendinblue;

class MyMailable extends Mailable
{
    use Queueable, 
        SerializesModels, 
        Sendinblue;

    /**
     * Build the message
     */
    public function build()
    {
        return $this
            ->to()
            ->sendinblue([
                'template_id'  => 1,
                'params'       => [
                    // insert parameters here
                ]
            ]);
    }
}
```


## Credits

- [Jeroen Hulshof](https://github.com/concept7)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
