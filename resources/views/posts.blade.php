<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- search flowbite --}}
    <form class="max-w-md mx-auto">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <label for="search" class="mb-2 py-4 text-sm font-medium text-gray-900 sr-only dark:text-white">
            Search
        </label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search for Article" name="search" />
            <button type="Submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Search
            </button>
        </div>
    </form>
    {{-- end search flowbite --}}

    {{ $posts->links() }}

    <div class="my-4 py-4 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-0">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <a href="/posts?category={{ $post->category->slug }}">
                            <span
                                class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex 
                                items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                {{ $post->category->name }}
                            </span>
                        </a>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <a href="/posts/{{ $post->slug }}">{{ Str::limit($post['title'], 150) }}
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        </h2>
                    </a>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($post['body']), 50 }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <img class="w-7 h-7 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                alt="Jese Leos avatar" />
                            <a href="/posts?author={{ $post->author->username }}">
                                <span class="font-medium text-sm dark:text-white">
                                    {{ $post->author->name }}
                                </span>
                            </a>
                        </div>
                        <a href="/posts/{{ $post->slug }}"
                            class="inline-flex items-center font-medium
                           text-primary-600 text-sm dark:text-primary-500">
                            Read more &raquo;
                        </a>
                    </div>
                </article>
            @empty
                <div class="justify-center items-center grid-cols-16">
                    <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl ">
                        Something's missing.</p>
                    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we can't find that page.
                        You'll find lots to explore on the all page. </p>
                    <a href="/posts"
                        class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back
                        to Posts</a>
                </div>
            @endforelse
        </div>
    </div>
    {{ $posts->links() }}

</x-layout>
