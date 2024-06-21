<button
    {{ $attributes->merge([
        'class' => "rounded-full inline-flex items-center justify-items-center text-center font-bold px-[12px] py-[2px] text-button-d h-[30px] lg:px-[24px] lg:py-[4px] lg:text-button-d lg:h-[38px] disabled:cursor-not-allowed {$variant_class}",
        'disabled' => $attributes->has('disabled'),
        'type' => 'button',
    ]) }}>
    {!! $label ?? $slot !!}
</button>
