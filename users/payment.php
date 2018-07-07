<?php

require_once 'app/init.php';

$total = $_POST['total'];

$token = $_POST['stripeToken'];

Stripe_Charge::create([
    "amount" => $total,
    "currency" => "php",
    "card" => $token,
    "description" => "You have been receive a Fullpayment!"
]);


echo "<script>window.location.href='user_index'</script>";


exit();