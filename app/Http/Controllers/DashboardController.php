<?php

namespace App\Http\Controllers;

use App\Source;
use App\Target;
class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard')
            ->with('targets', Target::all())
            ->with('sources', Source::with(['posts', 'posts.submissions'])->get());
    }
}
