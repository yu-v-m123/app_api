<?php

namespace App\Services\Auth;

use App\Models\User;

Class AuthService implements AuthServiceInterface
{
  private $user;

  public function __construct(AuthServiceInterface $authServiceInterface)
  {
    $this->$authServiceInterface;
  }

  // ログイン
  public function login()
  {
    //
  }

  // 新規登録
  public function register()
  {
    //
  }

  // ログアウト
  public function logout()
  {
    //
  }
}