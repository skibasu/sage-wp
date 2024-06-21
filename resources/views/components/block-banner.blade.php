<div {{ $attributes->merge(['class' => "rounded-full px-18 py-20 flex items-center {$variant_class}"]) }}>
    <div
        class="rounded-full w-icon h-icon bg-primary font-semibold text-smx text-black inline-flex items-center justify-center text-center shrink-0 grow-0">
        <spn>+ {!! $icon !!}</spn>
    </div>
    <p class="text-button-m pl-16 shrink-0 grow-0 max-w-iconrest leading-[1.5]">{!! $description !!}</p>
</div>
