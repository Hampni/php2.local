<?php

namespace App;

class ErrorMessage
{
    public function __construct()
    {

        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('magnus9044@gmail.com')
            ->setPassword('2481632o')
        ;

// Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

// Create a message
        $message = (new \Swift_Message('DB Error'))
            ->setFrom(['magnus9044@gmail.com' => 'Admin'])
            ->setTo(['i.prodanets@lajm.lt' => 'Illia Prodanets'])
            ->setBody('Ошибка подключения к базе данных')
        ;
    }

}