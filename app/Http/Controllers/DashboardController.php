<?php

namespace App\Http\Controllers;

use App\Source;
use App\Target;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', ['targets' => Target::all(), 'sources' => Source::with(['posts', 'posts.submissions'])->get()]);
    }
}
