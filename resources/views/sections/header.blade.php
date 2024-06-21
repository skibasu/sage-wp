<header class="banner py-2 bg-black relative z-50">
    <div class="flex justify-between items-center max-w-[1258px] w-full px-16 mx-auto">
        <a class="brand" href="{{ home_url('/') }}">
            {!! get_image($siteLogo) !!}
        </a>

        {{-- @if (has_nav_menu('primary_navigation'))
            <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'nav flex gap-24',
                    'echo' => false,
                ]) !!}
            </nav>
        @endif --}}
        <x-navigation></x-navigation>
        <div class="w-[141px]"></div>
    </div>
</header>
