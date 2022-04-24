<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Repositories\Auth\AuthRepositoryInterface;

Class AuthService implements AuthServiceInterface
{
  private AuthRepositoryInterface $authRepository;
  
  public function __construct(AuthRepositoryInterface $authRepository)
  {
    $this->authRepository = $authRepository;
  }

  // ログイン
  public function validation($user)
  {
    return $user->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);
  }

  // 新規登録
  public function register()
  {
    
  }

  // ログアウト
  public function logout()
  {
    //
  }
}