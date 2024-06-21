<x-column class="w-5/12">
    <div class="grid gap-16 grid-cols-2">
        <?php logger(json_encode($column_2)); ?>
        @foreach ($column_2 as $column)
            <x-servicecard :title="$column['title']" :id="$column['image']" :description="$column['description']"></x-servicecard>
        @endforeach()
    </div>
</x-column>
