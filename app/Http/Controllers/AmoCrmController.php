<?php

namespace App\Http\Controllers;

use AmoCRM\Client\AmoCRMApiClient;
use Illuminate\Http\Request;
use League\OAuth2\Client\Token\AccessTokenInterface;

class AmoCrmController extends Controller
{
    public function addLead(AmoCRMApiClient $apiClient)
    {

        $accessToken = new \League\OAuth2\Client\Token\AccessToken();

        $apiClient->setAccessToken($accessToken)
            ->setAccountBaseDomain($accessToken->getValues()['baseDomain'])
            ->onAccessTokenRefresh(
                function (AccessTokenInterface $accessToken, string $baseDomain) {
                    saveToken(
                        [
                            'accessToken' => $accessToken->getToken(),
                            'refreshToken' => $accessToken->getRefreshToken(),
                            'expires' => $accessToken->getExpires(),
                            'baseDomain' => $baseDomain,
                        ]
                    );
                }
            );
        $leadsService = $apiClient->leads();
        return $leadsService->get();
    }
}
