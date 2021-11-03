
<div class="relative mr-12" x-data="{isOpen: true}" @click.away="isOpen = false">
    <input type="text"  wire:model.debounce.500ms="search" class="bg-gray-800 text-sm rounded-full w-64 px-4 py-1 pl-8 focus:outline-none focus:ring focus:border-blue-300" placeholder="Search"
           @focus="isOpen=true"
           @keydown="isOpen=true"
           @keydown.escape.window="isOpen = false"
           @keydown.shift.tab="isOpen = false"
           x-ref="search"
           @keydown.window="
            if(event.keyCode === 191){
               $ref.search.focus();
               }
               "
    >
    <div class="absolute top-0"><img class="w-4 mt-2 ml-2" src="{{asset('assets/images/search.png')}}" alt=""></div>
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
   @if(strlen($search)>=2)
    <div class="z-50 absolute bg-gray-800 w-64 mt-4"
         x-show.transition.opacity="isOpen"
    >
        @if($searchResults->count()>0)
        <ul>
            @foreach($searchResults as $result)
                <li class="border border-gray-700">
                    <a href="{{route('movies.show',$result['id'])}}" class="block hover:bg-gray-700 px-3 py-3 text-sm flex items-center"
                    @if($loop->last)@keydown.tab="isOpen=false" @endif
                    >
                        @if($result['poster_path'])
                            <img class="w-8" src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="poster">
                        @else
                            <img class="w-8" src="https://via.placeholder.com/50x75" alt="">
                        @endif
                        <span class="ml-4">{{$result['title']}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        @else
            <li class="border border-gray-700 px-4 py-3">
                No results for "{{$search}}"
            </li>

        @endif

    </div>
    @endif
</div>

