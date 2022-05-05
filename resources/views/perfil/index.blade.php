@extends('layouts.app')
@section('titulo')
    Editar Perfil: <span class="font-bold text-rose-500">@</span>{{ auth()->user()->username }}
@endsection
@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0" method="POST">
                @csrf
                <div class="flex items-center mb-5">
                    <label for="username" class="inline-block w-20 mr-6 text-right font-bold text-gray-500">
                        Usuario
                    </label>
                    <input type="text" id="username" name='username' placeholder="Nombre de usuario"
                        class="flex-1 py-2 border-b-2 border-gray-400 focus:border-rose-400
                                  text-gray-500 placeholder-gray-300 bg-transparent
                                  outline-none @error('username') border-rose-500 @enderror"
                        value="{{ auth()->user()->username }}" />
                </div>
                @error('username')
                    <p class='bg-rose-500 text-white my-2 rounded-lg font-bold text-sm p-2 text-center'>{{ $message }}</p>
                @enderror

                {{-- <div class="flex items-center mb-5">
                    <label for="email" class="inline-block w-20 mr-6 text-right font-bold text-gray-500">
                        E-mail
                    </label>
                    <input type="email" id="email" name='email' placeholder="Tu e-mail"
                        class="flex-1 py-2 border-b-2 border-gray-400 focus:border-rose-400
                                  text-gray-500 placeholder-gray-300 bg-transparent
                                  outline-none @error('email') border-rose-500 @enderror"
                        value="{{ auth()->user()->email }}" />
                </div>
                @error('email')
                    <p class='bg-rose-500 text-white my-2 rounded-lg font-bold text-sm p-2 text-center'>{{ $message }}</p>
                @enderror --}}

                <div class="flex items-center mb-5">
                    <label for="imagen"
                        class="inline-block w-20 mr-6 text-right
                                                font-bold text-gray-500">
                        Imagen de Perfil
                    </label>
                    <input accept=".jpg, .jpeg, .png" id="imagen" name='imagen' type="file"
                        class="flex-1 py-2 border-b-2 border-gray-400 
                                  text-gray-500 placeholder-gray-300 bg-transparent
                                  outline-none " />
                </div>
                <div class="text-right">
                    <input type="submit"
                        class="py-3 px-8 mt-5 bg-black hover:bg-gray-800 uppercase hover:cursor-pointer rounded-xl text-white font-bold"
                        value="Guardar cambios" />
                </div>
            </form>
        </div>
    </div>
@endsection
