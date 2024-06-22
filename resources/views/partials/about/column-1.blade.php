<x-column class="w-full lg:w-7/12">
    <div class="pt-64 pb-24 lg:pb-0">
        <x-block-title :title="$column_1['title']" :icon="$column_1['title_icon']"></x-block-title>
        <x-block-slogan :slogan="$column_1['slogan']" class="max-w-[320px]"></x-block-slogan>
        <x-block-description :description="$column_1['description']" class="max-w-[400px]"></x-block-description>
        <x-button :label="$column_1['button_title']"></x-button>
    </div>
</x-column>
