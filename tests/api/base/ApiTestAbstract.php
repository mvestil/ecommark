<?php

namespace Tests\Api\Base;

use ApiTester;
use App\Models\User;

/**
 * Class AbstractApiTest
 */
abstract class ApiTestAbstract
{
    /**
     * @var ApiTester
     */
    public $tester;

    public function _before(ApiTester $I)
    {
        $this->tester = $I;

        $this->setDefaultHeaders();
    }

    protected function setDefaultHeaders()
    {
        $this->tester->haveHttpHeader('Accept', 'application/vnd.api+json');
    }

    protected function loginWithCreds(string $email, string $password = 'password')
    {
        $user = User::where('email', $email)
            ->where('password', $password)
            ->first();

        if (!$user) {
            throw new \Exception('Unable to find user to login');
        }

        $this->tester->haveHttpHeader('Authorization', 'Bearer ' . $user->api_token);

        return $user;
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->tester, $name], $arguments);
    }
}