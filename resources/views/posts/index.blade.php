@extends('layouts.main')

@section('main')
    <div class="flex flex-wrap justify-center gap-4 mt-4">


        @empty(!$posts)
            @foreach ($posts as $post)
                @if (auth()->user() &&
                        auth()->user()->postLikes->contains('id', $post->id))
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <span> {{ count($post->likes) }} </span>
                        <form action="{{ route('post.likes', ['post' => $post]) }}" method="post">
                            @csrf
                            <button class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="red" viewBox="0 0 24 24"
                                    stroke="red">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>

                        </form>
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400 truncate">{{ $post->text }}</p>

                        <a href="{{ route('posts.show', ['post' => $post]) }}"
                            class="inline-flex font-medium items-center text-blue-600 hover:underline">
                            voir l'article

                        </a>

                        {{-- <textarea :key="3" x-show="open" x-transition placeholder="entrez un commentaire"
                        class="rounded bg-gray-50 rounded-lg border border-gray-300" name="commentaire" id="" cols="40"
                        rows="3"></textarea> --}}
                    </div>
                @else
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <x-like-button-component :post="$post" color="white" />
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400 truncate">{{ $post->text }}</p>

                        <a href="{{ route('posts.show', ['post' => $post]) }}"
                            class="inline-flex font-medium items-center text-blue-600 hover:underline">
                            voir l'article

                        </a>


                    </div>
                @endif
            @endforeach
        @else
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h2> aucun article pour le moment...</h2>
            </div>
        @endempty

    </div>
    <div class="inline m-4">
        @if ($posts && $posts->hasPages())
            <div class="pagination-wrapper">
                {{ $posts->links() }}
            </div>
        @endif

    </div>
@endsection
