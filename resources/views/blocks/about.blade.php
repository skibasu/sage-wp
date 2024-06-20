<?php
$has_column_1 = isset($column_1) && !empty($column_1) && isset($column_1['title']) && !empty($column_1['slogan']);
$has_column_2 = isset($column_2) && !empty($column_2) && isset($column_2['image']) && !empty($column_2['image']);
$has_column_3 = isset($column_3) && !empty($column_3);
$has_description = isset($column_1['description']) && !empty($column_1['description']);
$has_button = isset($column_1['button_link']) && !empty($column_1['button_link']);
$has_icon = isset($column_1['title_icon']);
$has_image = isset($column_2['image']) && !empty($column_2['popups']);

?>
@if ($has_column_1)
    <section class="py-80 overflow-hidden">
        <div class="container">
            <x-row>
                @includeFirst(['partials.about.column-1', 'partials.about'])
                @includeFirst(['partials.about.column-2', 'partials.about'])
            </x-row>
            {{-- @includeFirst(['partials.about.column-3', 'partials.about']) --}}
        </div>
    </section>
@endif()
