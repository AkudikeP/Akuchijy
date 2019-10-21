<?php
require APPPATH . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'AC5f3314146e9dcfc5b868ea76846986ad';
$auth_token = '990b4c7ad8cfaec9d61cb1a06393b3c0';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+12512378391";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    '+2348147233465',
    array(
        'from' => $twilio_number,
        'body' => 'Thank you for registering with ANSVEL. Your registration code is "YIIEOSH".'
    )
);