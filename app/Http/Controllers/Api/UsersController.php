<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Retrieve paginated list of users
     *
     * @return mixed
     */
    public function index()
    {
        return User::paginate(config('medi.page_count'));
    }

    /**
     * Show a user
     *
     * @param User $user
     * @return User
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Persist a user
     *
     * @return mixed
     */
    public function store()
    {
        $data = $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        return User::create($data);
    }

    /**
     * Update a user
     *
     * @param User $user
     * @return mixed
     */
    public function update(User $user)
    {
        $data = $this->validate(request(), [
            'name' => 'string|max:255',
            'email' => [
                'string', 'email', 'max:255',
                Rule::unique('users')->ignore($user)
            ],
            'password' => 'string|min:6|confirmed',
        ]);

        $user->update($data);

        return response('', 204);
    }
}
