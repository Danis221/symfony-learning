<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Event\PostCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class PostSubscriber implements EventSubscriberInterface
{
    private \Swift_Mailer $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            PostCreatedEvent::class => 'onPostCreated'
        ];
    }

    public function onPostCreated(PostCreatedEvent $event)
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

        $this->mailer->send($message);
    }

}