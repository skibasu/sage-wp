<x-column class="w-7/12">
    <div class="pl-[90px]">
        <h1 class="leading-none tracking-wide text-white"><span class="leading-none block">{!! $column_1['slogan_1'] !!}</span>
            @if ($has_icon)
                <span><span class="float-left translate-y-[15px] translate-x-[12px]">{!! get_image($column_1['icon']) !!}</span><span
                        class="indent-[24px] block leading-[120%]">{!! $column_1['slogan_2'] !!}</span></span>
            @endif()
        </h1>
        @if ($has_description)
            <p class="p-16">{!! $column_1['description'] !!}</p>
        @endif()
        @if ($has_buttons)
            <div class="flex gap-12 pl-16">
                @foreach ($column_1['buttons'] as $button)
                    <?php $has_buttons_details = isset($button['button_text']) && isset($button['button_variant']) && !empty($button['button_text']) && !empty($button['button_variant']); ?>
                    @if ($has_buttons_details)
                        <x-button :label="$button['button_text']" :variant="$button['button_variant']"></x-button>
                    @endif()
                @endforeach()
            </div>
        @endif()
    </div>
</x-column>
