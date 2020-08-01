<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    /**
     * @Route("/form/email", name="email")
     */

    public function index( \Swift_Mailer $mailer )
    {

        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('danisza4@gmail.com')
            ->setTo('danisza4@gmail.com')
            ->setBody(
                $this->renderView(
                // templates/emails/registration.html.twig
                    'emails/registration.html.twig',
                //   ['name' => $name]
                ),
                'text/html'
            );

        $mailer->send($message);

        return $this->redirectToRoute('form_list');}

}