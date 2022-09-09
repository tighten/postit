<?php

namespace App\Http\Controllers;

use App\TrackingSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TrackingSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic');
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

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'key' => 'required|string|max:50',
            'value' => 'required|string',
        ]);

        $setting = TrackingSetting::firstOrNew([
            'key' => $request->input('key'),
        ]);

        $snaked = Str::snake($request->input('value'));

        if(Arr::exists($setting->value, $snaked)) {
            return response()->json([
                'error' => 'This value already exists.',
            ]);
        }

        $newValue = Arr::add($setting->value, $snaked, $request->input('value'));
        $setting->value = $newValue;
        $setting->save();

        return response()->json([
            'success' => $request->input('value') . ' has been added to the ' . $request->input('key') . ' list.',
        ]);
    }

    public function show(TrackingSetting $setting): TrackingSetting
    {
        return $setting;
    }

    public function edit(TrackingSetting $setting): TrackingSetting
    {
        return $setting;
    }

    public function update(Request $request, TrackingSetting $setting): JsonResponse
    {
        $request->validate([
            'value' => 'required|array',
        ]);

        try {
            $setting->update([
                'value' => $request->input('value'),
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage(),
            ]);
        }

        return response()->json([
            'success' => 'Settings have been successfully updated.',
        ]);
    }

    public function destroy(TrackingSetting $setting): JsonResponse
    {
        $setting->delete();

        return response()->json([
            'success' => 'Setting has been successfully deleted.',
        ]);
    }
}
