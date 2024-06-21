<?php
$has_column_1 = isset($column_1) && !empty($column_1) && isset($column_1['title']) && !empty($column_1['slogan']);
$has_column_2 = isset($column_2) && !empty($column_2) && isset($column_2['image']) && !empty($column_2['image']);
$has_column_3 = isset($column_3) && !empty($column_3);
?>
@if ($has_column_1)
    <section class="pt-80 pb-58 overflow-hidden">
        <div class="container">
            <x-row>
                @includeFirst(['partials.about.column-1', 'partials.about'])
                @if ($has_column_2)
                    @includeFirst(['partials.about.column-2', 'partials.about'])
                @endif()
            </x-row>
            @if ($has_column_3)
                <div class="mt-40">
                    @includeFirst(['partials.about.column-3', 'partials.about'])
                </div>
            @endif()

        </div>
    </section>
@endif()
