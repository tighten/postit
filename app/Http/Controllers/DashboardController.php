<?php

namespace App\Http\Controllers;

use App\Source;
use App\Target;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard')
            ->with('targets', Target::all())
            ->with('sources', Source::with(['posts', 'posts.submissions'])->get());
    }
}
