<?php
// using Sendgrid's PHP library
// https://gihub.com/sendgird/sendgrid-php
// If you are using Composer (recommended)
require 'vendor/autoload.php';
// If you are not using Composer
//require ("path/to/sendgrid-php/sendgrid-php.php");

// initialize dotenv
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
//haha
$form = new Sendgrid\Email("Firman", "rhenka.firdaus@gmail.com");
$subject = "Belajar kirim Email dengan API SendGrid";
$to = new SendGrid\Email("Ridwan", "va.rhenka@gmail.com");
$content = new SendGrid\Content("text/plain", "Hello, nama saya SendGrid Email");
$mail = new SendGrid\Mail($form, $subject, $to, $content);
$apikey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apikey);

// Kirim Email
$response = $sg->client->mail()->send()->post($mail);

// untuk debugging
echo "<pre>";
echo $response->statusCode();
print_r($response->headers());
echo $response->body();
echo "</pre>";