<?php
$has_column_1 = isset($column_1) && !empty($column_1) && isset($column_1['title']) && !empty($column_1['slogan']);
$has_column_2 = isset($column_2) && !empty($column_2) && isset($column_2['image']) && !empty($column_2['image']);
$has_column_3 = isset($column_3) && !empty($column_3);
?>
@if ($has_column_1)
    <section class="w-full pt-80 pb-72 rounded-40 overflow-hidden">
        <div class="container mb-46">
            <x-row>
                @includeFirst(['partials.industries.column-1', 'partials.industries'])
                @if ($has_column_2)
                    @includeFirst(['partials.industries.column-2', 'partials.indutries'])
                @endif()
            </x-row>
        </div>
        @if ($has_column_3)
            <div class="w-[1236px] m-auto px-16">
                @includeFirst(['partials.industries.column-3', 'partials.indutries'])
            </div>
        @endif()

    </section>
@endif()
