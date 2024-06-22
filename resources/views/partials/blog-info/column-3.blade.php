<x-column class="w-full lg:w-6/12">
    <div class="pt-32 lg:pt-0">
        @foreach ($column_3 as $id)
            <x-latest-post :id="$id"></x-latest-post>
        @endforeach()
    </div>
</x-column>
