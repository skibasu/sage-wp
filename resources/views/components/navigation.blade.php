<div>
    <ul>
        @foreach ($navigation as $item)
            <li @class([$item->classes]) data-page-id={{ $item->objectId }}>
                <a href="{{ $item->url }}">
                    {{ $item->label }}
                </a>

                @if (!empty($item->children))
                    <ul data-description="{{ $item->custom_text }}"
                        data-image-urls="{{ json_encode($item->custom_image_urls) }}"
                        data-link-title="{{ $item->button_title }}" data-submenu-page-id="{{ $item->submenu_page_id }}">
                        @foreach ($item->children as $child)
                            <li @class([$child->classes])>
                                <a href="{{ $child->url }}" data-submenu-page-id="{{ $child->submenu_page_id }}">
                                    {{ $child->label }} </a>
                            </li>
                        @endforeach

                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
