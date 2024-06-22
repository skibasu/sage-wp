<?php
$image_id = get_post_thumbnail_id($id);
$post_url = get_permalink($id);
?>
<a @class([$class]) href="{!! $post_url !!}">
    <x-image :id="$image_id" size="column-193-104" class="rounded-normal mb-16 lg:mb-0"
        imageclass="min-[192px] h-auto"></x-image>
    <div>
        <x-tag :id="$id" class="mb-16"></x-tag>
        <h3 class="text-base">{!! get_the_title($id) !!}</h3>
    </div>
</a>
