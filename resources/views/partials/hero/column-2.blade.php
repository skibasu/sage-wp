<div class="w-5/12 px-16 pt-[45px] flex justify-center">
    <div class="relative flex items-center justify-center w-[293px] h-[343px]">
        <span class="block absolute left-0 top-0 z-0">
            @includeFirst(['partials.hero.svg.border-1', 'partials.hero.svg.border'])
        </span>
        <figure class="rounded-larger overflow-hidden w-[267px] h-[320px] relative z-10">
            {!! get_image($column_2['column_2_image'], 'column-267-320') !!}
        </figure>
        @if ($has_popups)
            @foreach ($column_2['popups'] as $popup)
                <?php $has_column_popups = isset($popup['popup_image']) && !empty($popup['popup_image']) && isset($popup['popup_message']) && !empty($popup['popup_message']) && isset($popup['position']) && !empty($popup['position']); ?>
                @if ($has_column_popups)
                    <x-popup-message :message="$popup['popup_message']" :image="$popup['popup_image']" :position="$popup['position']"></x-popup-message>
                @endif()
            @endforeach()
        @endif()
        @if ($has_info)
            <div class="flex items-center absolute bottom-[-8px] left-[47%] z-20 w-[161px] h-[40px] -translate-x-1/2">
                <span class="block absolute left-0 top-0 z-0">
                    @includeFirst(['partials.hero.svg.border-2', 'partials.hero.svg.border'])
                </span>
                <p class="relative z-10 text-center w-full text-sm">{!! $column_2['more_info'] !!}</p>
            </div>
        @endif()
    </div>
</div>
