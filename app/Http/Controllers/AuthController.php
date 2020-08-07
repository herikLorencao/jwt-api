<?php


namespace App\Http\Controllers;


use App\Admin;
use App\Exceptions\InvalidUserTokenException;
use App\Http\Requests\TokenRequestValidator;
use App\Reader;
use App\JwtUser;
use Firebase\JWT\JWT;
use Illuminate\Auth\GenericUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function buildToken(Request $request, TokenRequestValidator $tokenRequestValidator)
    {
        $this->validate($request, $tokenRequestValidator->rules, $tokenRequestValidator->messages);
        $user = $this->findUser($request->login);

        $this->verifyIfUserIsValid($request->password, $user);
        $token = $this->generateJwt($user->login);

        return response()
            ->json(['access_token' => $token])
            ->withHeaders(['Authorization' => $token]);
    }

    private function generateJwt($userLogin)
    {
        return JWT::encode(['login' => $userLogin], env('JWT_KEY'));
    }

    private function verifyIfUserIsValid($informatedPassword, $user)
    {
        if (is_null($user)) {
            throw new InvalidUserTokenException("Usuário não existente no sistema");
        }

        if (!Hash::check($informatedPassword, $user->password)) {
            throw new InvalidUserTokenException("A senha do usuário está incorreta");
        }
    }

    private function findUser(string $login)
    {
        $user = JwtUser::where('login', $login)->first();

        if (is_null($user)) {
            return null;
        }

        return $user;
    }
}
