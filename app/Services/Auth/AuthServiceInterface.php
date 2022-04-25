<?php

namespace App\Services\Auth;

use App\Models\User;

interface AuthServiceInterface
{
  public function validation(object $user): array;

  public function register(object $request);

  public function logout();
}