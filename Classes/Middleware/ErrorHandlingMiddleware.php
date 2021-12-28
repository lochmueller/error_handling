<?php

declare(strict_types=1);

namespace EH\ErrorHandling\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Context\UserAspect;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ErrorHandlingMiddleware implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        /** @var Context $context */
        $context = GeneralUtility::makeInstance(Context::class);
        if (!$context->hasAspect('frontend.user')) {
            return $response;
        }

        /** @var UserAspect $userAspect */
        $userAspect = $context->getAspect('frontend.user');

        if (!$userAspect->isLoggedIn() && $response->getStatusCode() === 404) {
            $response = $response->withStatus(403);
        }

        return $response;
    }
}
