<header class="banner py-2 bg-black relative z-50">
    <div class="flex justify-between items-center max-w-[1258px] w-full px-16 mx-auto">
        <a class="brand" href="{{ home_url('/') }}">
            {!! get_image($siteLogo) !!}
        </a>
        <x-navigation></x-navigation>
        <div class="w-[141px] hidden lg:block"></div>
    </div>
</header>
