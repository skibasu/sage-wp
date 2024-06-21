<?php
$has_column_1 = isset($column_1) && !empty($column_1) && isset($column_1['title']) && !empty($column_1['slogan']);
$has_column_2 = isset($column_2) && !empty($column_2) && isset($column_2['image']) && !empty($column_2['image']);
$has_column_3 = isset($column_3) && !empty($column_3);

?>
@if ($has_column_1)
    <section>
        <div
            class="mx-auto xl:max-w-[1360px] w-full bg-darkBackground text-white pt-80 pb-72 rounded-40 overflow-hidden">
            <div class="container">
                <x-row>
                    @includeFirst(['partials.industries.column-1', 'partials.industries'])
                    @if ($has_column_2)
                        @includeFirst(['partials.industries.column-2', 'partials.indutries'])
                    @endif()
                </x-row>
            </div>
        </div>
    </section>
@endif()
