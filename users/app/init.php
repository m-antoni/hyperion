<?php

require_once 'vendor/autoload.php';

$stripe = [
    'pub_key' => 'pk_test_qv7auPbNlNH3HPIJzcX8FVJL',
    'pri_key' => 'sk_test_hBbffYh3iNkIXCFwBgzT3A4v'
];


Stripe::setApiKey($stripe['pri_key']);
