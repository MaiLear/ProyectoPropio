<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function validateToken(string $token)
    {
        $url = env('URL_SERVER_API') . "/token/validate";

        $response = Http::withToken($token)->get($url);
        return $response;
    }
}
