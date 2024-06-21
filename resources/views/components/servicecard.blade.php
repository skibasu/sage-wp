<div {{ $attributes->merge(['class' => "{$class}"]) }}>
    <x-image :id="$id" size="icon"></x-image>
    <h3 class="text-h4d">{!! $title !!}</h3>
    <p class="text-smd">{!! $description !!}</p>
</div>
