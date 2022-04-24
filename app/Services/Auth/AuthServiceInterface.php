<?php

namespace App\Services\Auth;

interface AuthServiceInterface
{
  /**
   * 引数$requestのバリデーションチェックをする
   * @param object
   * @return User
  */
  public function validation(object $user);

  public function register();

  public function logout();
}