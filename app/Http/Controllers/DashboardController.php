<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Source;
use App\Target;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard')
            ->with('targets', Target::all())
            ->with('sources', Source::with(['posts', 'posts.submissions'])->get());
    }
}
