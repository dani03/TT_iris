@extends('layouts.main', ['title' => $post->text])

@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex flex-col items-center mt-4 space-y-6">
        <!-- Article Section -->
        <div class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                    Need a help in Claim? {{ $post->title }}
                </h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                {{ $post->text }}
            </p>

        </div>

        <!-- Comments Section -->

        @if ($post->commentaires->isNotEmpty())
            <div
                class="w-full max-w-lg h-60 overflow-y-auto space-y-4 bg-gray-50 border border-gray-200 p-4 rounded-lg dark:bg-gray-800 dark:border-gray-600">
                @foreach ($post->commentaires as $commentaire)
                    <div class="p-4 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600">
                        {{-- <p class="font-semibold text-gray-900 dark:text-white">Commentaire de John Doe</p> --}}
                        <p class="text-gray-600 dark:text-gray-400 text-capitalize">
                            <span class="text-xl">{{ $commentaire->user->name }}: </span>
                            {{ $commentaire->comment }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Comment Section -->
        <form action="{{ route('commentaire.store', ['post_id' => $post->id]) }}" method="post" class="w-full max-w-lg">
            @csrf
            <textarea name="comment" placeholder="Entrez un commentaire"
                class="w-full p-3 rounded-lg border border-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                name="commentaire" rows="3"></textarea>
            <button type="submit"
                class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Ajouter un commentaire
            </button>
        </form>
    </div>
@endsection
