<?php

namespace App\Livewire\Sections;

use Livewire\Component;

class SectionTypeOne extends Component
{
    public $section;

    public function render()
    {
        return view('livewire.sections.section-type-one');
    }
}
