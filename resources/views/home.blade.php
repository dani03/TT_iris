@extends('layouts.main')

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


    <div class="text-center mt-12">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Mini Blog Test</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Laravel tailwind
            css.
        </p>


        <blockquote class=" mb-2 text-xl italic font-semibold text-gray-900 dark:text-white">

            <p>"Là où il n'y a pas de force il n'y a pas de lutte. "</p>
        </blockquote>

        <a href="{{ route('adding.post') }}"
            class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            vous avez un article à ajouter ?

        </a>

      

    </div>
@endsection
