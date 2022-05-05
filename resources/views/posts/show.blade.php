@extends('layouts.app')
@section('titulo')
    {{ $post->titulo }}
@endsection
@section('contenido')
    <div class="container px-20 mx-auto md:flex">
        <div class="md:w-1/2 mt-5">
            <img src="{{ asset('uploads' . '/' . $post->imagen) }}" alt="{{ $post->titulo }}">
            <div class="p-3 flex items-center gap-2">
                @auth
                    <livewire:like-post :post="$post" />
                @endauth
            </div>
            <div>
                <a href="{{ route('posts.index', $post->user) }} " class='font-bold'><span
                        class="text-rose-500">@</span>{{ $post->user->username }}</a>
                <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method='POST'>
                        @method('DELETE')
                        @csrf
                        <input type="submit"
                            class="py-3 px-8 mt-4 bg-black hover:bg-gray-800 uppercase hover:cursor-pointer rounded-xl text-white font-bold"
                            value="Eliminar Post" />
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-gray-600 text-center uppercase mb-4">Añade un nuevo Comentario</p>
                    @if (session('mensaje'))
                        <div class='bg-teal-300 uppercase text-white my-2 rounded-lg font-bold text-sm p-2 text-center'>
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="flex items-center mb-3">
                            {{-- <label for="descripcion"
                                class="inline-block w-20 mr-7 mt-2 mb-5 text-right font-bold text-gray-500">
                                Comentario
                            </label> --}}
                            <textarea id="comentario" name='comentario' placeholder="Escribe tu comentario..."
                                class="flex-1 py-8 px-10 border-b-2 border-gray-400 focus:border-gray-600
                                             text-gray-500 placeholder-gray-300 bg-transparent
                                             outline-none @error('comentario') border-rose-500 @enderror"></textarea>
                        </div>
                        @error('comentario')
                            <p class='bg-rose-500 text-white my-2 uppercase rounded-lg font-bold text-sm p-2 text-center'>
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="text-right">
                            <input type="submit"
                                class="py-3 px-8 mt-5 bg-black hover:bg-gray-800 uppercase hover:cursor-pointer rounded-xl text-white font-bold"
                                value="Publicar" />
                        </div>
                    </form>
                @endauth
                <div class="bg-white mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold text-gray-600">
                                    <span class='font-bold text-rose-500'>@</span>
                                    {{ $comentario->user->username }}
                                </a>
                                <p class="">{{ $comentario->comentario }}</p>
                                <p class="text-xs text-gray-400 font-semibold">
                                    {{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <h2 class='text-2xl text-center font-black text-gray-700 uppercase my-10'>No hay comentarios aún.
                        </h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
