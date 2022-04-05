@extends('layouts.base')

@section('content')
    <h1>Salut {{ auth()->user()->name }} !</h1>
@endsection
