<?php
$has_column_1 = isset($column_1) && !empty($column_1) && isset($column_1['title']) && !empty($column_1['slogan']);
$has_column_3 = isset($column_3) && !empty($column_3);
$has_column_2 = isset($column_2) && !empty($column_2);
?>
@if ($has_column_1)
    <section>
        <div class="mx-auto xl:max-w-[1360px] w-full bg-neutral-90 pt-80 pb-72 rounded-40 overflow-hidden">
            <div class="container">
                <x-row>
                    @includeFirst(['partials.books.column-1', 'partials.books'])
                    @if ($has_column_2)
                        @includeFirst(['partials.books.column-2', 'partials.books'])
                    @endif()
                    @if ($has_column_3)
                        @includeFirst(['partials.books.column-3', 'partials.books'])
                    @endif()
                </x-row>

            </div>
        </div>
    </section>
@endif()
