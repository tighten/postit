<?php

namespace App\Http\Controllers;

use App\TrackingSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TrackingSettingController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth.basic')->except('index');
    }

    public function index(Request $request): Collection | View
    {
        if($request->expectsJson()) {
            return TrackingSetting::all();
        }

        return view('tracking-settings');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
