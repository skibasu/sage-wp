<x-column class="w-5/12">
    <div class="grid gap-16 grid-cols-[192px_192px] auto-rows-max">
        @foreach ($column_3 as $id)
            <x-latest-ebook :id="$id"></x-latest-ebook>
        @endforeach()
    </div>
</x-column>
