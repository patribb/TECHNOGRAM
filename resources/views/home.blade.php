@extends('layouts.app')
@section('titulo')
    Mi Muro
@endsection
@section('contenido')
<x-listar-post :posts="$posts" />
@endsection
