@extends('layouts.app')
@section('titulo')
{{ $user->name }}
@endsection
@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5 ">
                <img class='rounded-full'
                    src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg') }}"
                    alt="usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center py-10  md:items-start md:justify-center">
                <div class="flex items-center gap-2">
                    <p class='text-gray-700 text-2xl uppercase'><span class="font-bold text-rose-500">@</span>{{ $user->username }}
                    </p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}"
                                class="text-gray-500 hover:text-gray-600 hover:cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-800 text-sm mt-5 font-bold">
                    {{$user->followers->count()}}
                    <span class='font-normal uppercase'>@choice('Seguidor|Seguidores', $user->followers->count())</span>
                </p>
                <p class="text-gray-800 text-sm  font-bold">
                    {{$user->followings->count()}}
                    <span class='font-normal uppercase'>Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->posts->count() }}
                    <span class='font-normal uppercase'>Posts</span>
                </p>
                @auth
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->siguiendo(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf
                                <input type="submit"
                                    class="bg-black uppercase hover:bg-gray-800 text-white rounded px-3 py-1 text-sx font-bold cursor-pointer"
                                    value="Seguir" />
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <input type="submit"
                                    class="bg-black uppercase hover:bg-gray-800 text-white rounded px-3 py-1 text-sx font-bold cursor-pointer"
                                    value="Dejar de seguir" />
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <section class='container mx-auto mt-10 px-4'>
        <h2 class='text-4xl text-center font-black text-gray-700 my-10 uppercase'>Publicaciones</h2>
        <x-listar-post :posts="$posts" />
    </section>
@endsection
