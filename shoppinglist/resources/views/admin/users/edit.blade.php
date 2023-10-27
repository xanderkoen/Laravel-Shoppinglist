@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container mx-1">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif


            <p class="text-3xl">[Adminpanel] Edit user : {{$user->name}}</p>

            <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                        name="name" id="name" value="{{old('name', $user->name)}}" type="text">
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Mail
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                        name="email" id="email" value="{{old('email', $user->email)}}" type="email">
                </div>

                <div>
                    <label for="role">
                        Role :
                    </label>
                    <select name="role" id="role">
                        @if($user->role == 1)
                            <option value="1" selected >Gebruiker</option>
                            <option value="2">Admin</option>
                        @elseif($user->role == 2)
                            <option value="1" >Gebruiker</option>
                            <option value="2" selected >Admin</option>
                        @endif
                    </select>
                </div>


                <div class="flex item-center justifiy-between">
                    <button id="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">Update Profiel
                    </button>
                </div>
            </form>
@endsection
