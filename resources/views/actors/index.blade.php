@extends('layouts.main')
@section('content')
    <div class="container w-10/12 mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-red-400 text-lg font-semibold">
                Popular actors
            </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8 mt-6 pb-12">
                    @foreach($popularActors as $actor)
                        <div class="actor hover:opacity-75 transition ease-in-out duration-500">
                            <a href="{{route('actors.show', $actor['id'])}}">
                               <img src="{{$actor['profile_path']}}" alt="">
                            </a>
                            <div class="mt-2">
                                <a href="{{route('actors.show', $actor['id'])}}" class="text-lg hover:text-gray-300">{{$actor['name']}}</a>
                                <div class="text-small truncate text-gray-400">{{$actor['known_for']}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="page-load-status my-8">
        <div class="flex justify-center">
            <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
        </div>
        <div class="flex justify-center">
            <div class="infinite-scroll-last">End of Content</div>
        </div>
        <div class="flex justify-center">
            <div class="infinite-scroll-error">No more pages to show</div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll( elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actor',
            status: '.page-load-status'
            // history: false,
        });
    </script>
@endsection

