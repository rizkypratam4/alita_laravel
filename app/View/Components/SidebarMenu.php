<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarMenu extends Component
{
    public $menuTitle;
    public $menuIcon;
    public $submenu;
    /**
     * Create a new component instance.
     */
    public function __construct($menuTitle, $menuIcon, $submenu = [])
    {
        $this->menuTitle = $menuTitle;
        $this->menuIcon = $menuIcon;
        $this->submenu = $submenu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-menu');
    }
}
