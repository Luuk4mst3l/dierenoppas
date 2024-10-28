@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Beheer Gebruikers</h1>
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('admin.users.changeRole', $user) }}" method="POST">
                                @csrf
                                <select name="role" onchange="this.form.submit()">
                                    <option value="owner" {{ $user->role === 'owner' ? 'selected' : '' }}>Eigenaar</option>
                                    <option value="sitter" {{ $user->role === 'sitter' ? 'selected' : '' }}>Oppasser</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.users.block', $user) }}" method="POST">
                                @csrf
                                <button type="submit">Blokkeren</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
