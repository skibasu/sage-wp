      <figure {{ $attributes->merge(['class' => "{$class}"]) }}>
          {!! get_image($id, $size) !!}
          @if ($slot)
              <figurecaption @class([$captionclass])>
                  {!! $slot !!}
              </figurecaption>
          @endif()
      </figure>
