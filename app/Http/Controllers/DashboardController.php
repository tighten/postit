<?php

namespace App\Http\Controllers;

use App\Source;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $targets = [
        [
            'name' => 'Laravel News',
            'url' => 'https://laravel-news.com/links/create'
        ],
    ];

    public function __invoke()
    {
        return view('dashboard')
            ->with('targets', $this->targets)
            ->with('sources', Source::with('posts')->get());
    }
}
