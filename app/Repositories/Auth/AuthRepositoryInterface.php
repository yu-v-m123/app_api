<?php

namespace App\Repositories\Auth;

interface AuthRepositoryInterface
{
  public function userRegister(object $request);
}