<div class="mt-8">
    <a href="{{route('Tv.show', $tvshow['id'])}}">
        <img src="{{$tvshow['poster_path']}}" class="hover:opacity-75 transition ease-in-out duration-150" alt="poster">
    </a>
    <div class="mt-2">
        <a href="{{route('movies.show', $tvshow['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$tvshow['name']}}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <img src="{{asset('assets/images/star.png')}}" class="w-4" alt="">
            <span class="ml-1">{{$tvshow['vote_average']}}%</span>
            <span class="mx-2">|</span>
            <span>{{$tvshow['first_air_date']}}</span>
        </div>
        <div class="text-gray-400 text-sm">
            {{$tvshow['genres']}}
        </div>
    </div>
</div>
