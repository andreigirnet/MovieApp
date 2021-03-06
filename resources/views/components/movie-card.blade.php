<div class="mt-8">
    <a href="{{route('movies.show', $movie['id'])}}">
        <img src="{{$movie['poster_path']}}" class="hover:opacity-75 transition ease-in-out duration-150" alt="poster">
    </a>
    <div class="mt-2">
        <a href="{{route('movies.show', $movie['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$movie['title']}}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <img src="{{asset('assets/images/star.png')}}" class="w-4" alt="">
            <span class="ml-1">{{$movie['vote_average']}}%</span>
            <span class="mx-2">|</span>
            <span>{{$movie['release_date']}}</span>
        </div>
        <div class="text-gray-400 text-sm">
            {{$movie['genres']}}
        </div>
    </div>
</div>
