      <figure class="overflow-hidden inline-block max-w-[400px]">
          {!! get_image($id, $size) !!}
          @if ($slot)
              <figurecaption class="block mt-8">
                  {!! $slot !!}
              </figurecaption>
          @endif()
      </figure>
