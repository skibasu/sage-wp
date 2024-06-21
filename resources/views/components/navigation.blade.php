@props([
    'name' => null,
    'inactive' => 'hover:text-primary',
    'inactive_child' => 'hover:text-primary',
    'active' => 'text-primary',
])
<nav class="primary-nav bg-black my-2">
    <ul class="flex gap-24 text-white text-sm">
        @foreach ($navigation as $item)
            <?php
            $has_children = !empty($item->children);
            $is_active = false;
            if ($has_children) {
            }
            $is_active = array_some($item->children, function ($children) {
                return $children->active === true;
            });
            ?>
            <li @class([
                $item->classes,
                $inactive => !$is_active && !$item->active,
                $active => $item->active || $is_active,
                'relative',
            ]) data-page-id={{ $item->objectId }}>
                <a href="{{ $item->url }}" class="inline-flex items-center gap-4">
                    <span>{{ $item->label }}</span>@svg('images.menu-arrow', ['class' => 'transition-transform'])
                </a>

                @if (!empty($item->children))
                    <div
                        class="sub-menu px-16 xl:w-rowlg absolute top-[100%] left-0 bg-white border-primary-100 rounded-12 border-solid border-6 none">
                        <div class="-mx-16 flex">
                            <div class="pl-[80px] pr-16 w-7/12 shrink-0 grow-0 flex flex-col items-start py-[45px]">
                                <h2 class="text-base font-normal">Produkty</h2>
                                <ul class="flex flex-wrap border-b border-solid border-b-black mb-16"
                                    data-description="{{ $item->link_description }}"
                                    data-image-ids="{{ json_encode($item->custom_image_ids) }}"
                                    data-link-title="{{ $item->button_title }}"
                                    data-submenu-page-id="{{ $item->submenu_page_id }}">
                                    @foreach ($item->children as $child)
                                        <li @class([
                                            $child->classes,
                                            $inactive_child => !$child->active,
                                            $active => $child->active,
                                            'grow-0 shrink-0 w-6/12 text-smx text-black font-semibold mb-12',
                                        ])>
                                            <a href="{{ $child->url }}"
                                                data-submenu-page-id="{{ $child->submenu_page_id }}">
                                                {{ $child->label }} </a>
                                        </li>
                                    @endforeach

                                </ul>
                                <x-button :label="$item->button_title" variant="outlined"></x-button>
                                <div class="px-16 mt-auto">
                                    <div class="-mx-16">
                                        <div class="px-16 py-16 flex flex-wrap gap-24 items-center">
                                            @foreach ($item->custom_image_ids as $id)
                                                <figure>
                                                    {!! get_image($id, null, $html = true) !!}
                                                </figure>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($item->submenu_page_id)
                                <div class="px-16 w-5/12 shrink-0 grow-0">
                                    <figure class="w-[364px]
                                h-[389px] p-6">
                                        {!! wp_get_attachment_image(get_post_meta($item->submenu_page_id, '_listing_image_id')[0], 'column-364-389', [
                                            'class' => 'w-full max-w-full',
                                        ]) !!}

                                    </figure>
                                </div>
                            @endif()
                        </div>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
