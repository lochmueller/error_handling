<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Error Handling',
    'description' => 'More specific error handling for (e.g. Intranets)',
    'state' => 'stable',
    'author' => 'Tim Lochmüller',
    'author_email' => 'webmaster@fruit-lab.de',
    'category' => 'fe',
    'internal' => '',
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'php' => '7.4.0-8.0.0',
            'typo3' => '10.4.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
