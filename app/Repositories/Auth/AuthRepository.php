<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

Class AuthRepository implements AuthRepositoryInterface
{
  private User $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * @param object
   * @return User
   * ここに引数の型と、返り値の型を入れる
   * 「?」はnullでも通るよといいう意味
   */
  public function userRegister(object $request): User
  {
    return $this->user->create([
      'name' => $request['name'],
      'email' => $request['email'],
      'password' => Hash::make($request['password']),
    ]);
  }
}