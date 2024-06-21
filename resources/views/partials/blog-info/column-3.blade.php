<x-column class="w-6/12">
    @foreach ($column_3 as $id)
        <x-latest-post :id="$id"></x-latest-post>
    @endforeach()
</x-column>
