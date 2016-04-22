<?php

namespace Wela;

use Wela\Authentication\AccessToken;

class QuovoApp
{
    protected $user;

    protected $password;

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAccessToken()
    {
        return new AccessToken([
            'user' => $this->user,
            'password' => $this->password
        ]);
    }
}