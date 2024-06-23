<?php

namespace Modules\Backend\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Backend\Http\Requests\LoginRequest;
use Modules\Backend\Services\LoginService;
use Modules\Core\Traits\ResponseMessage;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ResponseMessage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend::auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request, LoginService $loginService)
    {
        $responseRaw = $loginService->login($request->validated());
        $response = $responseRaw->getData(true);
        if ($response['status']) {
            return $this->success(
                [
                    'redirect' => $response['data']['redirect'],
                    'message' => $response['data']['message']
                ]
            );
        }

        return $this->error(
            [
                'message' => $response['data']['message']
            ]
        );
    }

    /**
     * Logout
     */

    public function logout(): RedirectResponse
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->to('/');
    }
}
