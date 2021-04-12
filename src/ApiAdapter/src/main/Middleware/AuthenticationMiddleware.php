<?php
declare(strict_types = 1);
namespace Gov\DpeRS\ApiAdapter\Middleware;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Mezzio\Authentication\UserInterface;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\Response;
use Gov\DpeRS\ApiAdapter\Domain\Auth\Client;
use Mezzio\Authentication\DefaultUser;
use Mezzio\Router\RouteResult;
use DateTime;
use DateInterval;
use Gov\DpeRS\ApiAdapter\Middleware\Service\ApiTools;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class AuthenticationMiddleware implements MiddlewareInterface
{

    protected $configs;

    protected $api;

    public function __construct(array $configs, ApiTools $api)
    {
        $this->configs = $configs;
        $this->api = $api;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = new JsonResponse('Access Denied', 403);
        $headers = $request->getHeaders();
        $client = $this->authenticate($headers);
        $externalBearer = $this->externalAuthenticate();
        $request = $request->withAttribute('bearer', $externalBearer);

        if (! $client->authenticated && $externalBearer !== false) :
            $response = new JsonResponse($client->message, 401);
        elseif ($client->authenticated) :
            $apiClient = new DefaultUser('APP_docker', [
                'API'
            ], [
                'API CLient'
            ]);
            $request = $request->withAttribute(UserInterface::class, $apiClient);
            $response = $handler->handle($request);
        else :
            $response = new JsonResponse('Invalid APi Key', 403);
        endif;

        return $response;
    }

    private function authenticate(array $headers): Client
    {
        $key = isset($headers['x-api-key'][0]) ? $headers['x-api-key'][0] : false;
        $clientName = isset($headers['x-api-client'][0]) ? $headers['x-api-client'][0] : false;
        $clientAuthenticated = false;
        $message = 'Authentication Failed - check your api key and client name';
        $status = 'ERROR';

        if ($key && $clientName && $clientName == $this->configs['AUTH_API_USER']) :
            $hashed = $this->configs['AUTH_API_HASH'];

            $clientAuthenticated = password_verify($key, $hashed);
            $message = $clientAuthenticated ? 'Client Looged' : 'Authentication Failed';
            $status = $clientAuthenticated ? 'SUCCESS' : 'ERROR';
        endif;

        return new Client($clientAuthenticated, false, $status, $message);
    }

    private function externalAuthenticate()
    {
        $provider = new GenericProvider([
            'clientId' => $this->configs['AUTH_CLIENT_ID'],
            'clientSecret' => $this->configs['AUTH_CLIENT_SECRET'],
            'redirectUri' => '',
            'urlAuthorize' => $this->configs['AUTH_BASE_URL'] . $this->configs['AUTH_AUTHORIZE'],
            'urlAccessToken' => $this->configs['AUTH_BASE_URL'] . $this->configs['AUTH_TOKEN'],
            'urlResourceOwnerDetails' => $this->configs['AUTH_BASE_URL'] . $this->configs['AUTH_RESOURCE']
        ]);

        try {
            $accessToken = $provider->getAccessToken('password', [
                'username' => $this->configs['AUTH_USERNAME'],
                'password' => $this->configs['AUTH_PWD']
            ]);
            $bearer = 'Authorization: Bearer ' . $accessToken;
            return $bearer;
        } catch (IdentityProviderException $e) {
            return false;
            // exit($e->getMessage());
        }
    }
}
