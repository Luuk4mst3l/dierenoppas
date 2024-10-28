<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function block(User $user)
    {
        $user->update(['blocked' => true]); // Zorg ervoor dat je een 'blocked' kolom toevoegt
        return redirect()->back()->with('success', 'Gebruiker geblokkeerd.');
    }

    public function changeRole(Request $request, User $user)
    {
        $request->validate(['role' => 'required|in:owner,sitter,admin']);
        $user->update(['role' => $request->role]);
        return redirect()->back()->with('success', 'Rol bijgewerkt.');
    }
}

