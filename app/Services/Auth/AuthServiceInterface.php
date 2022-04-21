<?php

namespace App\Services\Auth;

interface AuthServiceInterface
{
  public function login();
  public function register();
  public function logout();
}