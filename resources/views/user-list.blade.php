@extends('layout.app')

@section('title', 'Gerenciamento de usuários')

@section('header', 'Gerenciamento de usuários')

@section('content')
    <form method="GET" action="/" class="form-container">
        <label for="state">Selecione um estado:</label>
        <select id="state" name="state" onchange="this.form.submit()">
            <option value="">Todos os estados</option>
            @foreach ($states as $state)
                <option value="{{ $state }}" {{ $selectedState == $state ? 'selected' : '' }}>
                    {{ $state }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="user-table">
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sortedUsers as $user)
                    <tr onclick="window.location.href='/user/{{ $user['id'] }}'">
                        <td><img src="{{ $user['image'] }}"></td>
                        <td>{{ $user['firstName'] }} {{ $user['lastName'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['address']['city'] }}</td>
                        <td>{{ $user['address']['state'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
