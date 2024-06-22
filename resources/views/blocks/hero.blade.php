<?php
$has_column_1 = isset($column_1) && !empty($column_1) && isset($column_1['slogan_1']) && !empty($column_1['slogan_1']) && isset($column_1['slogan_2']) && !empty($column_1['slogan_2']);
$has_column_2 = isset($column_2) && !empty($column_2) && isset($column_2['column_2_image']) && !empty($column_2['column_2_image']);
$has_description = isset($column_1['description']) && !empty($column_1['description']);
$has_buttons = isset($column_1['buttons']) && !empty($column_1['buttons']);
$has_icon = isset($column_1['icon']);
$has_popups = isset($column_2['popups']) && !empty($column_2['popups']);
$has_info = isset($column_2['more_info']) && !empty($column_2['more_info']);
?>
@if ($has_column_1)
    <section class="bg-black text-white pt-32 pb-0 lg:pt-[100px] lg:pb-[100px]  relative">
        <div class="overflow-hidden w-full h-full absolute left-0 top-0 z-0">
            <span class="block absolute  top-[-376px] right-[-453px] z-0">
                @includeFirst(['partials.hero.svg.background-primary', 'partials.hero.svg.background'])
            </span>
        </div>
        <div class="container">
            <x-row>
                @includeFirst(['partials.hero.column-1', 'partials.hero'])
                @if ($has_column_2)
                    @includeFirst(['partials.hero.column-2', 'partials.hero'])
                @endif()
            </x-row>

    </section>
@endif()
