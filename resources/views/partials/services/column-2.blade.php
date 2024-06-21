<x-column class="w-5/12">
    <div class="grid gap-16 grid-cols-[192px_192px] auto-rows-max">
        @foreach ($column_2 as $column)
            <x-servicecard :title="$column['title']" :id="$column['image']" :description="$column['description']"></x-servicecard>
        @endforeach()
    </div>
</x-column>
