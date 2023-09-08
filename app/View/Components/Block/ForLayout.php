<?php

namespace App\View\Components\Block;

use App\Models\Block;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ForLayout extends Component
{
    public Collection $blocks;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $layout
    )
    {
        $this->blocks = Block::query()->orderBy('weight')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.block.for-layout');
    }
}
