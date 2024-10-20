<!DOCTYPE html>
<html>
<head>
    <title>Zoek Gebruiker</title>
</head>
<body>
    <h1>Zoek Gebruiker</h1>

    <form method="GET" action="{{ route('users.index') }}">
        <input type="text" name="search" placeholder="Zoek gebruiker...">
        <button type="submit">Zoek</button>
    </form>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('users.assignRole', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit">Maak partijbeheerder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
