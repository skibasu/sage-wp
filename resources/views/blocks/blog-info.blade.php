 <?php
 $has_column_1 = isset($column_1) && !empty($column_1) && isset($column_1['title']) && !empty($column_1['slogan']);
 $has_column_3 = isset($column_3) && !empty($column_3);
 $has_column_2 = isset($column_2) && !empty($column_2);
 ?>
 @if ($has_column_1)
     <section>
         <div
             class="mx-auto xl:max-w-[1360px] w-full bg-darkBackground text-white pt-80 pb-72 rounded-40 overflow-hidden">
             <div class="container">
                 <x-row>
                     @if ($has_column_1)
                         @includeFirst(['partials.blog-info.column-1', 'partials.blog-info'])
                     @endif()
                     @if ($has_column_2)
                         @includeFirst(['partials.blog-info.column-2', 'partials.blog-info'])
                     @endif()
                     @if ($has_column_3)
                         @includeFirst(['partials.blog-info.column-3', 'partials.blog-info'])
                     @endif()
                 </x-row>
             </div>
         </div>
     </section>
 @endif()
