<?php

namespace App\View\Components;

use Closure;
use App\Models\Area;
use App\Models\Division;
use App\Models\Departement;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Breadcrumb extends Component
{
    public $title;
    public $breadcrumbs = [];

    public function __construct($title = 'Page')
    {
        $this->title = $title;

        $url = request()->getPathInfo();
        $segments = array_values(array_filter(explode('/', $url)));
        $path = '';

        foreach ($segments as $i => $segment) {
            $path .= '/' . $segment;

            // Custom logic for Departement
            if ($i > 0 && $segments[$i - 1] === 'departements' && $segment !== 'edit') {
                $departement = Departement::find($segment);
                if ($departement) {
                    $this->breadcrumbs[] = [
                        'name' => 'Edit Departement ' . $departement->name,
                        'url' => $path
                    ];
                    break;
                }
            }

            // Custom logic for Departement
            if ($i > 0 && $segments[$i - 1] === 'areas' && $segment !== 'edit') {
                $area = Area::find($segment);
                if ($area) {
                    $this->breadcrumbs[] = [
                        'name' => 'Edit Area ' . $area->name,
                        'url' => $path
                    ];
                    break;
                }
            }

            if ($i > 0 && $segments[$i - 1] === 'divisions' && $segment !== 'edit') {
                $division = Division::find($segment);
                if ($division) {
                    $this->breadcrumbs[] = [
                        'name' => 'Edit division ' . $division->name,
                        'url' => $path
                    ];
                    break;
                }
            }
            

            // Skip numeric IDs unless handled above
            if (is_numeric($segment)) {
                continue;
            }

            // Default breadcrumb item
            $this->breadcrumbs[] = [
                'name' => ucfirst(str_replace('-', ' ', $segment)),
                'url' => $path
            ];
        }
    }

    public function render()
    {
        return view('components.breadcrumb', [
            'breadcrumbs' => $this->breadcrumbs ?? [], // kasih default array kosong
            'title' => $this->title
        ]);
    }
}
