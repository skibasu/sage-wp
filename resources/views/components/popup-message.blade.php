<div
    {{ $attributes->merge(['class' => "absolute z-20 bg-neutral-80 rounded-lg flex gap-12 items-center pl-10 py-12 pr-35 text-black text-sm w-[203px] {$position}"]) }}>
    <figure class="w-[38px] h-[38px] rounded-full overflow-hidden shrink-0">
        {!! get_image($image, 'icon-38') !!}
    </figure>
    <p class="grow-0 shrink-0 w-[107px]">{!! $message !!}</p>
</div>
