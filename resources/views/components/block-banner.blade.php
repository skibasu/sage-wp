<div {{ $attributes->merge(['class' => "rounded-full px-18 py-20 flex {$variant_class}"]) }}>
    <div class="rounded-full w-icon h-icon bg-primary font-semibold text-smx">+ {!! $icon !!}</div>
    <p class="text-button-m">{!! $description !!}</p>
</div>
