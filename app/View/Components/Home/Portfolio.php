<?php

namespace App\View\Components\Home;

use Illuminate\Support\Arr;
use Illuminate\View\Component;
use function url;
use function view;
use \App\Models\ProjectTypes;
use \App\Models\Projects;


class Portfolio extends Component
{
    public array $items = [];

    public array $tabs = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $projects = Projects::with('projectTypes')->get();

        $this->items = $projects->map(function ($project) {
            return [
                'category' => [$project->projectTypes->name],
                'title' => $project->title,
                'image' => url($project->image),
                'github' => $project->github,
            ];
        })->toArray();

        $this->tabs = ProjectTypes::pluck('name')->unique()->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.portfolio');
    }
}
