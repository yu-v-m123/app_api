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

  public function userRegister($request)
  {
    return $this->user->create([
      'name' => $request['name'],
      'email' => $request['email'],
      'password' => Hash::make($request['password']),
    ]);
  }
}