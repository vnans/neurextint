<?php

$container->loadFromExtension('framework', [
    'serializer' => [
        'enabled' => false,
    ],
    'messenger' => [
        'serializer' => [
            'enabled' => true,
        ],
        'transports' => [
            'default' => 'amqp://localhost/%2f/messages',
        ],
    ],
]);
