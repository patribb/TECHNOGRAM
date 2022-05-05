@extends('layouts.app')
@section('titulo')
    Crea una nueva publicación
@endsection
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form method="POST" enctype="multipart/form-data" action="{{ route('imagenes.store') }}" id='dropzone' class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
              @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow mt-10 md:mt-0">
            <form novalidate class="py-5 px-3 lg:mb-5 " action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="flex items-center mb-5">
                    <label for="titulo" class="inline-block w-20 mr-6 text-right font-bold text-gray-500">
                        Título
                    </label>
                    <input type="text" id="titulo" name='titulo' placeholder="Titulo para tu publicacion"
                        class="flex-1 py-2 border-b-2 border-gray-400 focus:border-rose-400
                                      text-gray-500 placeholder-gray-300 bg-transparent
                                      outline-none @error('titulo') border-rose-500 @enderror"
                        value="{{ old('titulo') }}" />
                </div>
                @error('titulo')
                    <p class='bg-rose-500 text-white my-2 uppercase rounded-lg font-bold text-sm p-2 text-center'>{{ $message }}</p>
                @enderror

                <div class="flex items-center mb-5">
                    <label for="descripcion" class="inline-block w-20 mr-7 mb-5 text-right font-bold text-gray-500">
                        Descripción
                    </label>
                    <textarea id="descripcion" name='descripcion' placeholder="Descripción de la publicación..."
                        class="flex-1 py-2 border-b-2 border-gray-400 focus:border-rose-400
                                          text-gray-500 placeholder-gray-300 bg-transparent
                                          outline-none @error('descripcion') border-rose-500 @enderror"
                        >{{ old('descripcion') }}</textarea>
                </div>
                @error('descripcion')
                    <p class='bg-rose-500 text-white my-2 rounded-lg font-bold text-sm p-2 uppercase text-center'>{{ $message }}</p>
                @enderror

                <div class="flex items-center mb-5">
                    <input type="hidden"  name='imagen'  class="@error('imagen') border-rose-500 @enderror" 
                    value="{{ old('imagen') }}"
                    />
                </div>
                @error('imagen')
                    <p class='bg-rose-500 text-white my-2 rounded-lg font-bold text-sm p-2 uppercase text-center'>{{ $message }}</p>
                @enderror

                <div class="text-right">
                    <input type="submit"
                        class="py-3 px-8 mt-5 bg-black hover:bg-gray-800 uppercase hover:cursor-pointer rounded text-white font-bold"
                        value="Publicar" />
                </div>
            </form>
        </div>
    </div>
@endsection
