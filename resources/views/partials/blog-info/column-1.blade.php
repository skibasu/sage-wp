<x-column class="w-full grid grid-cols-[1fr_1fr] mb-32">
    <div>
        <x-block-title :title="$column_1['title']" :icon="$column_1['title_icon']"></x-block-title>
        <x-block-slogan :slogan="$column_1['slogan']" class="max-w-[500px] !mb-0"></x-block-slogan>
    </div>
    <div class="flex justify-end items-end">
        <x-button :label="$column_1['button']" variant="filled"></x-button>
    </div>
</x-column>
