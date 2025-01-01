<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-700">
                {{ $post['title'] }}
            </h2>
            <div class="text-base text-gray-500">
                <a href="#">{{ $post->author->name }}</a> | {{ $post->created_at->diffForHumans(); }}
            </div>
            <p>
                {{ ($post['body']) }}
            </p>
            <a href="/posts" class="font-medium text-blue-500 mb-5">&laquo;Back to Posts</a>
        </article>
        
</x-layout>

