@extends('layouts.app')
@section('titulo')
    Regístrate en DevStagram
@endsection
@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="registrar">
        </div>
        <div class="md:w-5/12 bg-white p-1 rounded-lg shadow">
            <form novalidate class="py-10 px-3 lg:mb-5 " action="{{ route('register') }}" method="POST">
                @csrf
                <div class="flex items-center mb-5">
                    <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-500">
                        Nombre
                    </label>
                    <input type="text" id="name" name='name' placeholder="Nombre"
                        class="flex-1 py-2 border-b-2 border-gray-400 focus:border-rose-400
                                      text-gray-500 placeholder-gray-300 bg-transparent
                                      outline-none @error('name') border-rose-500 @enderror" 
                                      value="{{ old('name') }}"
                                      />
                </div>
                @error('name')
                        <p class='bg-rose-500 text-white my-2 rounded-lg font-bold text-sm p-2 text-center'>{{ $message }}</p>
                    @enderror

                <div class="flex items-center mb-5">
                    <label for="username"
                        class="inline-block w-20 mr-6 text-right
                                                    font-bold text-gray-500">
                        Usuario
                    </label>
                    <input 
                    value="{{ old('username') }}"
                    id="username" name='username' type="text" placeholder="Nombre de usuario"
                        class="flex-1 py-2 border-b-2 border-gray-400 focus:border-rose-400
                                      text-gray-500 placeholder-gray-300 bg-transparent
                                      outline-none @error('username') border-rose-500 @enderror" />
                </div>
                @error('username')
                <p class='bg-rose-500 text-white my-2 rounded-lg font-bold text-sm p-2 text-center'>{{ $message }}</p>
            @enderror

                <div class="flex items-center mb-5">
                    <label for="email" class="inline-block w-20 mr-6 text-right font-bold text-gray-500">
                        E-mail
                    </label>
                    <input 
                    value="{{ old('email') }}"
                    id="email" type="email" name='email' placeholder="Tu e-mail"
                        class="flex-1 py-2 border-b-2 border-gray-400 focus:border-rose-400
                                      text-gray-500 placeholder-gray-300 bg-transparent
                                      outline-none @error('email') border-rose-500 @enderror" />
                </div>
                @error('email')
                <p class='bg-rose-500 text-white my-2 rounded-lg font-bold text-sm p-2 text-center'>{{ $message }}</p>
            @enderror

                <div class="flex items-center mb-5">
                    <label for="password" class="inline-block w-20 mr-6 text-right font-bold text-gray-500">
                        Contaseña
                    </label>
                    <input 
                    id="password" type="password" name='password' placeholder='Elige una contraseña'
                        class="flex-1 py-2 border-b-2 border-gray-400 focus:border-rose-400
                                      text-gray-500 placeholder-gray-300 bg-transparent
                                      outline-none @error('password') border-rose-500 @enderror" />
                </div>
                @error('password')
                <p class='bg-rose-500 text-white my-2 rounded-lg font-bold text-sm p-2 text-center'>{{ $message }}</p>
            @enderror

                <div class="flex items-center mb-5">
                    <label for="password_confirmation" class="inline-block w-20 mr-6 text-right font-bold text-gray-500">
                        Repetir Contaseña
                    </label>
                    <input id="password_confirmation" type="password" name='password_confirmation'
                        placeholder='Confirma tu contraseña'
                        class="flex-1 py-2 border-b-2 border-gray-400 focus:border-rose-400
                                      text-gray-500 placeholder-gray-300 bg-transparent
                                      outline-none" />
                </div>

                <div class="text-right">
                    <input type="submit"
                        class="py-3 px-8 mt-5 bg-rose-400 hover:bg-rose-500 hover:cursor-pointer rounded-xl text-white font-bold"
                        value="Crear cuenta" />
                </div>
            </form>
        </div>
    </div>
@endsection
