<?php
$image_id = get_post_thumbnail_id($id);
$post_url = get_permalink($id);
?>
<a @class([$class]) href="{!! $post_url !!}">
    <x-image :id="$image_id" size="column-193-104"
        class="[&>img]:w-full [&>img]:h-full [&>img]:object-cover] rounded-normal"></x-image>
    <div>
        <x-tag :id="$id"></x-tag>
        <h3 class="text-base">{!! get_the_title($id) !!}</h3>
    </div>
</a>
