@extends('layouts.main')
@section('content')
    <div class="tv-info w-10/12 mx-auto border-b border-gray-800">
        <div class="mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{$tvshow['poster_path']}}" alt="parasite" class=" w-64 md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold ">{{$tvshow['name']}}</h2>
                <div class="mt-2">
                    <a href="" class="text-lg mt-2 hover:text-gray-300">{{$tvshow['name']}}</a>
                    <div class="flex flex-col md:flex-row items-center text-gray-400 text-sm mt-1">
                        <img src="{{asset('assets/images/star.png')}}" class="w-4" alt="">
                        <span class="ml-1">{{$tvshow['vote_average']}}%</span>
                        <span class="mx-2">|</span>
                        <span>{{$tvshow['first_air_date']}}</span>
                        <span class="mx-2">|</span>
                        <div class="text-gray-400 text-sm">
                            {{$tvshow['genres']}}
                        </div>
                    </div>
                    <p class="text-gray-300 mt-8">
                        {{$tvshow['overview']}}
                    </p>
                    <div class="flex mt-4">
                        @foreach($tvshow['created_by'] as $crew)
                            <div class="mr-8">
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400">Creator</div>
                            </div>
                        @endforeach
                    </div>
                    <div x-data="{showModal: false}">
                        @if(count($tvshow['videos']['results'])>0)
                            <div @click="showModal=true" class="mt-12 w-40 cursor-pointer">
                                <span class="flex items-center bg-red-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-red-600 transition ease-in-out duration-150">
                                    <div class="w-6"><img src="{{asset('assets/images/clapperboard.png')}}" alt=""></div>
                                    <div class="ml-2">Play Trailer</div>
                                </span>
                            </div>

                        <div x-show.transition.opacity="showModal" style="background-color: black;" class=" fixed top-0 left-0 flex items-center shadow-lg overflow-y-auto w-full h-full">
                            <div class="modal w-9/12 bg-gray-900 rounded mx-auto" style="height: 670px;">
                                <span @click="showModal = false"  class="flex justify-end mt-2 mr-2 cursor-pointer"><img class="w-8 h-8" src="{{asset('assets/images/close.png')}}" alt=""></span>
                                <div class="px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative">
                                        <iframe width="1100" height="515" src="https://www.youtube.com/embed/{{$tvshow['videos']['results'][0]['key']}}"   style="border:0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <div class="movie-cast w-10/12 mx-auto border-b border-gray-800 pb-12">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach($tvshow['cast'] as $cast)
                @if($cast['profile_path'])
                <div class="mt-8">
                    <a href="{{route('actors.show', $cast['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w300/'.$cast['profile_path']}}" alt="Cast" class=" w-64 md:w-96 hover:opacity-75 transition duration-500 ease-in-out">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">{{$cast['name']}}</a>
                        <div class="text-gray-400 text-sm">
                            {{$cast['character']}}
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

    </div>
    <div x-data="{showImage: false, image:''}">
        <div class="movie-cast w-10/12 mx-auto border-b border-gray-800 pb-12">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Images</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($tvshow['images'] as $image)
                    <div class="mt-8 cursor-pointer">
                    <span  @click="
                    showImage=true
                    image='{{'https://image.tmdb.org/t/p/original/'.$image['file_path']}}'
                    ">
                        <img  src="{{'https://image.tmdb.org/t/p/w500/'.$image['file_path']}}" alt="parasite" class=" w-64 md:w-96 hover:opacity-75 transition duration-500 ease-in-out">
                    </span>
                    </div>
                @endforeach
            </div>
            <div x-show.transition.opacity="showImage" style="background-color: black; " class=" fixed top-0 left-0 flex items-center shadow-lg overflow-y-auto w-full h-full">
                <div class="modal w-9/12 bg-gray-900 rounded mx-auto" style="height: 600px; opacity:1;">
                    <span @click="showImage = false" @keydown.escape.window="showImage = false"  class="flex justify-end mt-2 mr-2 cursor-pointer"><img class="w-8 h-8" src="{{asset('assets/images/close.png')}}" alt=""></span>
                    <div class="px-8 py-8">
                        <div class="responsive-container overflow-hidden relative">
                            <img :src="image" class="w-full" style="height: 500px" alt="poster">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
