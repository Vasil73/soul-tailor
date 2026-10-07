<?php

namespace App\Livewire\Components\Bedding;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Fabrics extends Component
{
    #[Layout('layouts.app', [
        'title' => 'Ткани для постельного белья — Bedding Atelier',

        'description' => 'Ткани для пошива постельного белья '
            .'по индивидуальным размерам. '
            .'Выбор материала и согласование деталей заказа.'
            .'Поможем сравнить плотность, мягкость и фактуру материалов,
           подобрать спокойный оттенок и подходящую комплектацию.',

        'ogImageAlt' => 'Bedding Atelier — ткани для постельного белья',
    ])]
    public function render()
    {
        return view('components.bedding.fabrics');
    }
}
