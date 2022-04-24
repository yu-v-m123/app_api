<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\Auth\AuthService;
use App\Repositories\Auth\AuthRepository;

class AuthController extends Controller
{
  private AuthService $authService;
  private AuthRepository $authRepository;

  public function __construct(
    AuthService $authService,
    AuthRepository $authRepository
    )
  {
    $this->authService = $authService;
    $this->authRepository = $authRepository;
  }

  // ログイン
  public function login(Request $request): JsonResponse
  {
    // リクエストパラメーターをバリデーションにかける
    $credentials = $this->authService->validation($request);

    // もしtrueであれば200を返す
    if (Auth::attempt($credentials)) {
      // $request->session()->regenerate();
      return response()->json(['message' => 'ログインしました', Response::HTTP_OK]);
    }

    // falseあれば認証エラーを返す
    return response()->json(['message' => 'ログインに失敗しました', Response::HTTP_UNAUTHORIZED]);
  }

  // 新規登録
  public function register(UserRequest $request): JsonResponse
  {
    $this->authRepository->userRegister($request);
    return response()->json(['message' => '登録しました'] , Response::HTTP_OK);
  }

  public function logout()
  {
    //
  }
}
