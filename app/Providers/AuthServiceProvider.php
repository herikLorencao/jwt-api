<?php

namespace App\Providers;

use App\Admin;
use App\Exceptions\ResourceNotFoundException;
use App\Reader;
use App\JwtUser;
use Firebase\JWT\JWT;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            if (!$request->hasHeader('Authorization')) {
                return null;
            }

            $bearer = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $bearer);

            try {
                $userData = JWT::decode($token, env('JWT_KEY'), ['HS256']);
            } catch (\Exception $e) {
                throw new ResourceNotFoundException('O token informado apresenta problemas');
            }

            return $this->findUserByLogin($userData->login);
        });
    }

    private function findUserByLogin(string $login)
    {
        $user = JwtUser::where('login', $login)->first();

        if (is_null($user)) {
            return null;
        }

        return $user;
    }
}
