<x-row>
    <div>
        <div class="grid grid-cols-3 gap-68">
            @foreach ($column_3['years'] as $column)
                <?php
                $has_element = isset($column['years']) && isset($column['years_description']) && !empty($column['years']) && !empty($column['years_description']);
                ?>@if ($has_element)
                    <div class="text-center border-t border-solid border-black py-24">
                        <p class="text-xxl leading-none mb-24">{!! $column['years'] !!}</p>
                        <p class="font-medium text-p18 leading-[1.3]">{!! $column['years_description'] !!}</p>
                    </div>
                @endif()
            @endforeach()
        </div>
    </div>
</x-row>
