<x-column class="w-full lg:w-4/12 lg:pt-[45px] flex justify-center lg:justify-end">
    <div
        class="relative flex items-center justify-center w-[240px] h-[281px] lg:w-[293px] lg:h-[343px] translate-y-[46px] lg:translate-y-0">
        <span class="absolute left-0 top-0 z-0 w-full h-full hidden lg:block">
            @includeFirst(['partials.hero.svg.border-1', 'partials.hero.svg.border'])
        </span>
        <span class="absolute left-0 top-0 z-0 w-full h-full block lg:hidden">
            @svg('images.border-1-mobile')
        </span>
        <x-image class="rounded-larger overflow-hidden w-[218px] h-[261px] lg:w-[267px] lg:h-[320px] relative z-10"
            :id="$column_2['column_2_image']" size="column-267-320" imageclass="w-full h-full object-cover">
        </x-image>
        @if ($has_popups)
            @foreach ($column_2['popups'] as $popup)
                <?php $has_column_popups = isset($popup['popup_image']) && !empty($popup['popup_image']) && isset($popup['popup_message']) && !empty($popup['popup_message']) && isset($popup['position']) && !empty($popup['position']); ?>
                @if ($has_column_popups)
                    <x-popup-message :message="$popup['popup_message']" :image="$popup['popup_image']" :position="$popup['position']"></x-popup-message>
                @endif()
            @endforeach()
        @endif()
        @if ($has_info)
            <div
                class="hidden lg:flex items-center absolute bottom-[-8px] left-[47%] z-20 w-[161px] h-[40px] -translate-x-1/2">
                <span class="block absolute left-0 top-0 z-0">
                    {{-- Improve with @svg directive --}}
                    @includeFirst(['partials.hero.svg.border-2', 'partials.hero.svg.border'])
                </span>
                <p class="relative z-10 text-center w-full text-sm">{!! $column_2['more_info'] !!}</p>
            </div>
        @endif()
    </div>
</x-column>
