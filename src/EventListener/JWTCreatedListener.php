<?php

namespace App\EventListener;

// src/App/EventListener/JWTCreatedListener.php
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use App\Repository\UserRepository;
use App\Entity\User;


class JWTCreatedListener
{


    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $payload = $event->getData();
        $user = $event->getUser();

        $payload['pseudo'] = $user->getUserIdentifier();
        $payload['id'] = $user->getId();

        $event->setData($payload);
    }
}