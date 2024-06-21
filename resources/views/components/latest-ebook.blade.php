<?php
$image_id = get_post_thumbnail_id($id);
$post_url = get_permalink($id);
?>


<a @class([$class]) href="{!! $post_url !!}">
    <div class="mb-32">
        @svg('images.book')
    </div>
    <h3 class="text-p18 font-semibold">{!! get_the_title($id) !!}</h3>
</a>
