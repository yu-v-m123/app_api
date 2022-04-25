<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
  private AuthService $authService;

  // コントローラーには基本Serviceクラスだけ読み込む。Repositoryだけの場合でもServiceクラスを経由する必要がある。
  public function __construct(
    AuthService $authService
    )
  {
    $this->authService = $authService;
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
    $this->authService->register($request);
    return response()->json(['message' => '登録しました'] , Response::HTTP_OK);
  }

  public function logout()
  {
    //
  }
}
