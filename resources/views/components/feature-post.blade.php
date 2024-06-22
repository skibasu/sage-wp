<?php
$image_id = get_post_thumbnail_id($id);
$post_url = get_permalink($id);
?>
<a @class([$class]) href="{!! $post_url !!}">
    <x-image :id="$image_id" size="column-504-272" class="block w-full mb-24 rounded-normal"
        imageclass="w-full h-full object-cover"></x-image>
    <div class="flex flex-col-reverse lg:grid lg:gap-16 grid-cols-[4fr_1fr]">
        <div class="pr-36">
            <h3 class="text-base mb-16">{!! get_the_title($id) !!}</h3>
            <p class="text-p12 leading-[1.8]">{{ get_the_excerpt($id) }}</p>
        </div>
        <div class="self-start flex justify-end">
            <x-tag :id="$id" class="mb-16"></x-tag>
        </div>


    </div>
</a>
