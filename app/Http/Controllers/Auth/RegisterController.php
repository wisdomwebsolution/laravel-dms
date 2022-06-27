<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Exception;

final class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('auth.register');
    }

    /**
     * @param \App\Http\Requests\Auth\RegisterRequest $request
     * @param \App\Services\Application\Auth\RegisterService $registerService
     * @return \Illuminate\Contracts\View\View
     */
    public function register(
        \App\Http\Requests\Auth\RegisterRequest $request,
        \App\Services\Application\Auth\RegisterService $registerService
    ): \Illuminate\Contracts\View\View {
        $registerRequest = $request->makeInput();

        try {
            $registerService->handle($registerRequest);
        } catch (Exception $e) {
            return view('auth.register')
            ->with($request->all())
            ->with('error', $e->getMessage());
        }

        return view('auth.registered');
    }
}
