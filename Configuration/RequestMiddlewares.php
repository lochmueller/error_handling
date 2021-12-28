<?php

use EH\ErrorHandling\Middleware\ErrorHandlingMiddleware;

return [
    'frontend' => [
        'error-handling/handle' => [
            'target' => ErrorHandlingMiddleware::class,
            'before' => [
                'typo3/cms-frontend/base-redirect-resolver',
            ],
            'after' => [
                'typo3/cms-frontend/authentication',
            ],
        ],
    ],
];
