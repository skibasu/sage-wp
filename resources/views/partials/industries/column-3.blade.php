<x-row>
    <div>
        <div class="grid grid-cols-6 gap-16">
            @foreach ($column_3 as $column)
                <?php
                $has_column = isset($column['icon']) && isset($column['description']) && !empty($column['icon']) && !empty($column['description']);
                ?>
                @if ($has_column)
                    <div class="p-24 bg-neutral-80">
                        <div class="mb-12">{!! get_image($column['icon']) !!}</div>
                        <p class="font-medium text-p18 ">{!! $column['description'] !!}</p>
                    </div>
                @endif()
            @endforeach()
        </div>
    </div>
</x-row>
