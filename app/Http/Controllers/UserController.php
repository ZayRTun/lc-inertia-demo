<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Request;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($user) => [
                    'id'    => $user->id,
                    'name'  => $user->name,
                    'email' => $user->email,
                    'can'   => [
                        'edit' => Auth::user()->can('edit', $user)
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can'     => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store()
    {
        $attributes = Request::validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        User::create($attributes);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $attributes = Request::validate([
            'name'  => 'required|string',
            'email' => 'required|email'
        ]);

        $user->update($attributes);

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        //
    }
}
