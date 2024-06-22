<x-column class="w-full lg:w-5/12">
    <div class="grid gap-16 [minmax(100%,_1fr)] lg:grid-cols-[192px_192px] auto-rows-max mb-32 lg:mb-0">
        <?php $index = 1; ?>
        @foreach ($column_2 as $column)
            <?php $is_even = $index % 2 == 0; ?>
            <x-servicecard :title="$column['title']" :id="$column['image']" :description="$column['description']"
                class="{!! $is_even ? 'place-self-end' : '' !!}"></x-servicecard>
            <?php $index++; ?>
        @endforeach()
    </div>
    <div class="lg:hidden flex justify-center">
        <x-button :label="$column_1['button_title']"></x-button>
    </div>

</x-column>
