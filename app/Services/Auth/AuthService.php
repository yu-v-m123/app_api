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

  /**
   * ログイン
   * 引数$userのバリデーションチェックをする
   * @param object
   * @return User
  */
  public function validation($user): array
  {
    return $user->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);
  }

  /**
   * 新規登録
   * AuthRepositoryに渡す
   * @param object
  */
  public function register(object $request)
  {
    $this->authRepository->userRegister($request);
  }

  // ログアウト
  public function logout()
  {
    //
  }
}