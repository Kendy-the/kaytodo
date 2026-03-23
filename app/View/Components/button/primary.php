<?php

namespace App\View\Components\button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class primary extends Component
{
    /**
     * Create a new component instance.
    */
    public string $formVerifyError;
    public function __construct(
        string $formVerifyError = "none",
        public string $action,
        public string $type,
        public string $name,
    )
    {
        $this->formVerifyError = $formVerifyError;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.primary');
    }
}
