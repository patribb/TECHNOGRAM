<div>
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div class="">
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="{{ $post->titulo }}">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="my-10">
            {{ $posts->links() }}
        </div>
    @else
        <h2 class='text-2xl text-center font-black text-rose-500 my-10'>No hay Posts diponibles. Sigue a alguien para
            ver sus publicaciones.</h2>
    @endif
</div>
