<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class App extends Component
{
    public function render()
    {
        return view('layouts.app',
            [
                'title' => 'Постельное бельё на заказ по вашим размерам — Bedding Atelier',

                'description' => 'Пошив постельного белья из турецкого хлопка '
                    .'по индивидуальным размерам. Поможем выбрать ткань '
                    .'и комплектацию. Посмотрите наши работы и оставьте заявку.',
            ]
        );
    }
}
