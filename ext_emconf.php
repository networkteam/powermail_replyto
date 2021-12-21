<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'powermail_replyto',
    'description' => 'Use sender of receiver mail as reply to.',
    'category' => 'misc',
    'version' => '0.0.1',
    'author' => 'networkteam',
    'author_email' => 'typo3@networkteam.com',
    'author_company' => 'networkteam GmbH',
    'constraints' => [
        'depends' => [
            'powermail' => '8.4.1-8.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [],
    ],
];
