<?php

namespace App\View\Components\Home;

use Illuminate\Support\Arr;
use Illuminate\View\Component;
use function url;
use function view;

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
        $this->items = [
            [
                'category' => ['Laravel', 'Tailwind.css', 'Bootstrap'],
                'title' => 'Full Stack app with Laravel, Tailwindcss ,Bootstrap',
                'image' => url('/img/survey.png'),
                'github' => 'https://github.com/developer006tz'
            ],
            [
                'category' => ['Tailwind.css', 'Bootstrap'],
                'title' => 'Okioma.se, My profile, gtog.co.tz',
                'image' => url('/img/yii2-ecommerce.jpg'),
                'github' => 'https://github.com/developer006tz'
            ],
            [
                'category' => ['Codeigniter', 'Laravel'],
                'title' => 'REST API with Laravel 9 and Sanctum',
                'image' => url('/img/laravel-rest-api.png'),
                'github' => 'https://github.com/developer006tz'
            ],
            [
                'category' => ['Django'],
                'title' => 'Django project , Timetable management System',
                'image' => url('/img/php-mvc-framework.png'),
                'github' => 'https://github.com/developer006tz'
            ],
            [
                'category' => ['Logo Design', 'Fliers','Posters'],
                'title' => 'Logo Design',
                'image' => url('/img/yii2-youtube-clone.png'),
                'github' => 'https://github.com/developer006tz'
            ],
            [
                'category' => ['Fliers', 'Posters'],
                'title' => 'Fliers and Poster Design',
                'image' => url('/img/yii2-vue-notes.png'),
                'github' =>  'https://github.com/developer006tz'
            ],
            [
                'category' => ['Flutter'],
                'title' => 'Mobile Application Development',
                'image' => url('/img/yii2-vue-notes.png'),
                'github' =>  'https://github.com/developer006tz'
            ],
        ];

        $this->tabs = array_unique(Arr::flatten(Arr::pluck($this->items, 'category')));
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
