<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class PopupMessage extends Component
{
   public string $message;

   public int $image;

   public string $position;

   public array $positions = [
      'top-left' => 'top-[-24px] right-[-38px] lg:right-auto lg:top-[78px] lg:left-[-76px]',
      'bottom-left' => 'bottom-[-39px] left-[77px] lg:bottom-[64px] lg:left-[-78px]',
      "center-right" => "bottom-[59px] left-[-43px] lg:left-auto lg:bottom-[140px] lg:right-[-64px]"

   ];
   /**
    * Create a new component instance.
    */
   public function __construct($message = "", $image, $position = "top-left")
   {
      $this->message = $message;
      $this->image = $image;
      $this->position = $this->positions[$position];

   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.popup-message');
   }
   public function shouldRender(): bool
   {
      return Str::length($this->message) > 0;
   }
}
