 <?php
 $has_icon = isset($icon) && !empty($icon);
 ?>
 <h1 {{ $attributes->merge(['class' => "leading-none tracking-wide {$class}"]) }}>
     @if ($icon)
         <span class="float-left translate-y-[15px] translate-x-[12px]">{!! get_image($icon) !!}</span>
     @endif()
     <span class="indent-[24px] block leading-[120%]">{!! $title !!}</span>
 </h1>
