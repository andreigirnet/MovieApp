@extends('layouts.main')
@section('content')
    <div class="movie-info w-10/12 mx-auto border-b border-gray-800">
        <div class="mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div>
                <img src="{{$actor['profile_path']}}" alt="parasite" class=" w-64 md:w-80">
                <ul class="flex items-center justify-center mt-4">
                    @if($social['facebook'])
                    <li>
                        <a href="{{$social['facebook']}}"  title="Facebook"><img class="w-12" src="{{asset('assets/images/facebook.png')}}" alt=""></a>
                    </li>
                    @endif
                    @if($social['instagram'])
                        <li class="ml-6">
                            <a href="{{$social['instagram']}}" title="Instagram"><img class="w-12" src="{{asset('assets/images/instagram.png')}}" alt=""></a>
                        </li>
                    @endif
                    @if($social['twitter'])
                        <li class="ml-6">
                            <a href="{{$social['twitter']}}" title="Twitter"><img class="w-12" src="{{asset('assets/images/twitter.png')}}" alt=""></a>
                        </li>
                    @endif
                    @if($actor['homepage'])
                        <li class="ml-6">
                            <a href="{{$actor['homepage']}}" title="Site"><img class="w-12" src="{{asset('assets/images/web-link.png')}}" alt=""></a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="md:ml-24" style="width: 800px">
                <h2 class="text-4xl font-semibold ">{{$actor['name']}}</h2>
                <div class="mt-2">
                    <div class="flex flex-col md:flex-row items-center text-gray-400 text-sm mt-1">
                        <img src="{{asset('assets/images/cake.png')}}" class="w-4" alt="">
                        <span class="ml-1">{{$actor['birthday']}} | {{$actor['age']}} years old | Born in {{$actor['place_of_birth']}}</span>

                        </div>
                    </div>
                    <p class="text-gray-300 mt-8">
                        {{$actor['biography']}}
                    </p>
                    <h4 class="font-semibold mt-12">Known For Movies:</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 mt-4 gap-8">
                       @foreach($knownForMovies as $movie)
                            <div class="mt">
                                <a href=""><img src="{{$movie['poster_path']}}" class="hover:opacity-75 transition ease-in-out duration-500 w-56" alt=""></a>
                                <a href="" class="text-sm loading-normal block text-gray-400 hover:text-white mt-1" style="text-align: center">{{$movie['title']}}</a>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>


    </div>

    <div class="credits w-10/12 mx-auto border-b border-gray-800 pb-12">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="mt-4">
                @foreach($credits as $credit)
                <li class="mt-2"> {{$credit['release_year']}} &middot;<strong>{{$credit['title']}}</strong> as {{$credit['character']}}</li>
                @endforeach
            </ul>
        </div>

    </div>
@endsection
