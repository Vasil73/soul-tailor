<?php

namespace App\Livewire\Components\Bedding;

use Livewire\Component;

class Header extends Component
{
    public bool $sent = false;

    public function submit(): void
    {
        // Сохранение заявки...

        $this->sent = true;
    }

    public function render()
    {
        return view('components.bedding.header');
    }
}
