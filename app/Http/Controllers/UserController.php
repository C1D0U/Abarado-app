<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function show()
    {
        $users = [
            [
                'name' => 'John Doe',
                'gender' => 'male'
            ],
            [
                'name' => 'Jane Doe',
                'gender' => 'female'
            ]
        ];

        return response()->json($users);
    }

    public function index(UserService $userService)
    {
        return $userService->listUsers();
    }

    public function first(UserService $userService)
    {
        return collect($userService->listUsers())->first();
    }

    public function get(UserService $userService, $id)
    {
        $user = collect($userService->listUsers())
            ->filter(function ($item) use ($id) {
                return $item['id'] == $id;
            })
            ->first();

        return $user;
    }

    public function indexView(UserService $userService)
    {
        return view('users.index', [
            'users' => $userService->listUsers()
        ]);
    }

    public function showFirst(UserService $userService)
    {
        $user = collect($userService->listUsers())->first();

        return view('users.index', [
            'users' => [$user]
        ]);
    }

    public function getView(UserService $userService, $id)
    {
        $user = collect($userService->listUsers())
            ->filter(function ($item) use ($id) {
                return $item['id'] == $id;
            })
            ->first();

        return view('users.index', [
            'users' => $user ? [$user] : []
        ]);
    }
}