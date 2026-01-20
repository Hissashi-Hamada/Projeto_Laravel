@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
@php
    $userType = auth()->user()->user_type ?? 'user';
    $isAdmin = $userType === 'admin';
    $welcomeText = $isAdmin ? 'Bem-vindo, Vendedor!' : 'Bem-vindo, Cliente!';
    $welcomeColor = $isAdmin ? 'blue' : 'green';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        p {
            font-size: 20px;
            font-weight: bold;
            color: {{ $welcomeColor }};
        }
    </style>
</head>
<body>
    <p>{{ $welcomeText }}</p>
</body>
</html>
@endsection
