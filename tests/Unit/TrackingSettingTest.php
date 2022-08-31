<?php

namespace Tests\Unit;

use App\TrackingSetting;
use Tests\TestCase;

class TrackingSettingTest extends TestCase
{
    /** @test */
    public function can_store_setting_in_json_by_passing_array()
    {
        $setting = TrackingSetting::factory()->create();

        $this->assertIsArray($setting->value);

        $this->assertDatabaseHas('tracking_settings', [
            'value' => json_encode($setting->value),
        ]);
    }

    /** @test */
    public function settings_seeded_with_campaigns()
    {
        $this->assertDatabaseHas('tracking_settings', [
            'key' => 'campaigns',
        ]);
    }

    /** @test */
    public function settings_seeded_with_sources()
    {
        $this->assertDatabaseHas('tracking_settings', [
            'key' => 'sources',
        ]);
    }

    /** @test */
    public function settings_seeded_with_mediums()
    {
        $this->assertDatabaseHas('tracking_settings', [
            'key' => 'mediums',
        ]);
    }
}
