 <?php
 $has_column_1 = isset($column_1) && !empty($column_1) && isset($column_1['title']) && !empty($column_1['slogan']);
 $has_column_2 = isset($column_2) && !empty($column_2);
 ?>
 @if ($has_column_1)
     <section>
         <div
             class="mx-auto xl:max-w-[1360px] w-full bg-darkBackground text-white pt-80 pb-72 rounded-40 overflow-hidden">
             <div class="container">
                 <x-row>
                     @includeFirst(['partials.services.column-1', 'partials.services'])
                     @if ($has_column_2)
                         @includeFirst(['partials.services.column-2', 'partials.services'])
                     @endif()
                 </x-row>
             </div>
         </div>
     </section>
 @endif()
