<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/autoload.php';


$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
    ->setUsername('magnus9044@gmail.com')
    ->setPassword('2481632o')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('я лучший'))
    ->setFrom(['magnus9044@gmail.com' => 'Admin'])
    ->setTo(['i.prodanets@lajm.lt' => 'Illia Prodanets'])
    ->setBody('го в шахматы')
;

// Send the message
if ($mailer->send($message)) {
    echo 'sent';
} else {
    echo 'fail';
}







