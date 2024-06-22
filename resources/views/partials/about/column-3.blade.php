<x-row>
    <div>
        <div class="px-24 lg:px-0 grid grid-cols-2 lg:grid-cols-3 gap-16 lg:gap-68">
            <?php $index = 1; ?>
            @foreach ($column_3['years'] as $column)
                <?php
                $has_element = isset($column['years']) && isset($column['years_description']) && !empty($column['years']) && !empty($column['years_description']);
                ?>@if ($has_element)
                    <div class="text-center border-t border-solid border-black py-24{!! $index === 3 ? ' col-span-2 lg:col-auto' : '' !!}"
                        id="">
                        <p class="text-xxl leading-none mb-24">{!! $column['years'] !!}</p>
                        <p class="font-medium text-p12 lg:text-p18 leading-[1.3]">{!! $column['years_description'] !!}</p>
                    </div>
                @endif()
                <?php $index = $index + 1; ?>
            @endforeach()
        </div>
    </div>
</x-row>
