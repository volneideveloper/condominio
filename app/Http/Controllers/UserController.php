<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Se tiver imagem, salva no disco public
        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('images/users', 'public');
        }

        // Criptografa a senha antes de salvar
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    }




    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'telefone' => 'nullable|string|max:20',
            'system_status_id' => 'nullable|integer',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('images/users', 'public');
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso.');
    }
}
