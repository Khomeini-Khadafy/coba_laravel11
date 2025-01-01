<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @foreach ($posts as $post)
        <a href="/posts/{{ $post['slug'] }}">
            <article class="py-8 max-w-screen-md border-b border-gray-300">
                <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-700">
                    {{ $post['title'] }}
                </h2>
        </a>
        <div class="text-base text-gray-500">
            <a class="hover:underline" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> | {{ $post->created_at->diffForHumans() }}
        </div>
        <p>
            {{ Str::limit($post['body']), 150 }}
        </p>
        <a href="/posts/{{ $post['slug'] }}">Read more &raquo;</a>
        </article>
    @endforeach

</x-layout>
