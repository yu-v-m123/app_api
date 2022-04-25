<?php

namespace App\Repositories\Auth;

use App\Models\User;

interface AuthRepositoryInterface
{
  // インターフェースにはコメント書かず、処理がかいてあるところに書く
  // インターフェースのメリットは、テストのしやすさと可読性
  public function userRegister(object $request): User;
}