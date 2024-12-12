@extends('layouts.main')

@section('main')
    <div class="flex flex-wrap justify-center gap-4 mt-4">

        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h2> Bienvenue sur votre escpace {{ auth()->user()->name }}</h2>
        </div>


    </div>
@endsection
