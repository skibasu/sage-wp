<x-column class="w-full grid grid-cols-[1fr_1fr] mb-40">
    <div>
        <x-block-title :title="$column_1['title']" :icon="$column_1['title_icon']"></x-block-title>
        <x-block-slogan :slogan="$column_1['slogan']" class="max-w-[500px]"></x-block-slogan>
    </div>
    @if (isset($column_1['button_label']) && !empty($column_1['button_label']))
        <div class="flex justify-end items-end">
            <x-button :label="$column_1['button_label']" variant="outlined-contrast"></x-button>
        </div>
    @endif()
</x-column>