<?php

namespace App\Amo;

$apiClient = new \AmoCRM\Client\AmoCRMApiClient(config('app.client_id'), config('app.client_secret'), config('app.redirect_url'));
