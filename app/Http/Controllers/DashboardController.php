<?php

namespace App\Http\Controllers;

use App\Models\Source;
use App\Models\Target;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', ['targets' => Target::all(), 'sources' => Source::with(['posts', 'posts.submissions'])->get()]);
    }
}
