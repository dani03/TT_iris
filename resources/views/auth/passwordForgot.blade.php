@extends('layouts.guest')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">


        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            @if (session('success'))
                <div class="alert text-green-800 bg-green-100 border border-green-300 p-4 rounded mb-4">
                    {{ session('message') }}
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert text-red-800">
                        {{ $error }}
                    </div>
                @endforeach
                @endif
            <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
                @csrf
                <p> Vous avez oubliez votre mot de passe entrez ? un lien de reinitialisation vous sera envoyez ...</p>
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">entrez votre adresse
                        mail</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                </div>



                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">un
                        lien de reinitialisation vous sera envoyez</button>
                </div>
            </form>


        </div>
    </div>
@endsection
