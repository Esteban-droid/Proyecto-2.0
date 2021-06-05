@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1> Bienvenido/a {{auth()->user()->name}}</h1>
</div> 
    <example-component></example-component>
@endsection