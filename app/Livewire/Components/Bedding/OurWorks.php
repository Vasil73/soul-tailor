<?php

namespace App\Livewire\Components\Bedding;

use Livewire\Component;

class OurWorks extends Component
{
    public ?array $selectedWork = null;

    public function openWork(int $index): void
    {
        $works = array_values(config('works', []));

        if (! isset($works[$index])) {
            return;
        }

        $work = $works[$index];

        $this->selectedWork = [
            'title' => (string) ($work['title'] ?? ''),
            'description' => (string) ($work['description'] ?? ''),
            'image' => (string) (
                $work['full_image']
                ?? $work['image']
                ?? ''
            ),
            'alt' => (string) (
                $work['alt']
                ?? $work['title']
                ?? 'Фотография выполненной работы'
            ),
        ];
    }

    public function closeWork(): void
    {
        $this->selectedWork = null;
    }

    public function render()
    {
        $works = config('works', []);

        return view('components.bedding.our-works', compact('works'));
    }
}
