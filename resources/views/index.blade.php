@extends('layouts.app')

@section('content')
    @include('partials.page-header')
    <div class="w-full flex p-8 relative">
        <div class="h-12 w-4/12 absolute top-0 left-8 grayscale-0 z-10"></div>
        <div class="w-3/6 h-12 border-solid border-2 border-sky-500 bg-orange-400">
            <h1 class="text-center grayscale-0">
                @svg('images.success')
                <span class="pl-2">Lewy</span>
            </h1>
        </div>
        <div class="w-3/6 h-12 border-solid border-2 border-sky-500 bg-orange-400">
            <h1 class="text-center">Prawy</h1>
        </div>
    </div>
    @if (!have_posts())
        <x-alert type="warning">
            {!! __('Sorry, no results were found.', 'sage') !!}
        </x-alert>

        {!! get_search_form(false) !!}
    @endif

    @while (have_posts())
        @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
    @endwhile

    {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
    @include('sections.sidebar')
@endsection
