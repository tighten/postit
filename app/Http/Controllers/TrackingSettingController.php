<?php

namespace App\Http\Controllers;

use App\TrackingSetting;
use Illuminate\Http\Request;

class TrackingSettingController extends Controller
{
    public function index()
    {
        return TrackingSetting::all();
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
