@extends('layouts.base')

@section('content')
    @auth()
    <h1>Salut {{ auth()->user()->name }} !</h1>
    @endauth
@endsection
