@extends('layout.app')

@section('title', 'Detalhes do usuário')

@section('header', 'Detalhes do usuário')

@section('content')
    <div class="goBack">
        <a class="back" href="/">Voltar</a>
    </div>

    <div class="user-details">
        <img src="{{ $user['image'] }}" alt="Imagem do usuario">
        <h2>{{ $user['firstName'] }} {{ $user['lastName'] }}</h2>
        <p>Nome de usuario: {{ $user['username']}} </p>
        <p>Universidade: {{ $user['university'] }}</p>
        <p>Email: {{ $user['email'] }}</p>
        <p>Telefone: {{ $user['phone'] }}</p>
        <p>Idade: {{ $user['age'] }}</p>
        <p>Endereço:
            {{ $user['address']['address'] }},
            {{ $user['address']['city'] }},
            {{ $user['address']['stateCode'] }},
            {{ $user['address']['postalCode'] }}
        </p>
        <p>Tipo sanguíneo: {{ $user['bloodGroup'] }} </p>
    </div>
@endsection
