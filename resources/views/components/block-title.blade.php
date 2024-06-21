 <?php
 $has_icon = isset($icon) && !empty($icon);
 ?>
 <h1
     {{ $attributes->merge(['class' => "flex gap-4 items-center mb-24 font-medium text-sm uppercase text-button-m {$class}"]) }}>
     @if ($icon)
         <span>{!! get_image($icon) !!}</span>
     @endif()
     <span class="block">{!! $title !!}</span>
 </h1>
