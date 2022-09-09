<?php

namespace Tests\Unit;

use App\TrackingSetting;
use App\User;
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

    /** @test */
    public function can_get_settings_with_authentication()
    {
        $this->actingAs(User::factory()->create())
            ->get(route('tracking.settings.index'))
            ->assertOk();
    }

    /** @test */
    public function cannot_get_settings_without_authentication()
    {
        $this->get(route('tracking.settings.index'))
            ->assertUnauthorized();
    }

    /** @test */
    public function can_create_settings_with_authentication()
    {
        $this->actingAs(User::factory()->create())
            ->post(route('tracking.settings.store'), [
                'key' => 'campaigns',
                'value' => 'Star Wars',
            ])
            ->assertJson([
                'success' => 'Star Wars has been added to the campaigns list.',
            ]);
    }

    /** @test */
    public function cannot_create_settings_without_authentication()
    {
        $this->post(route('tracking.settings.store'), [
                'key' => 'campaigns',
                'value' => 'Star Wars',
            ])
            ->assertUnauthorized();
    }

    /** @test */
    public function can_update_settings_with_authentication()
    {
        $setting = TrackingSetting::factory()->create();
        $newSetting = TrackingSetting::factory()->make();

        $this->actingAs(User::factory()->create())
            ->patch(route('tracking.settings.update', ['setting' => $setting]), [
                'value' => $newSetting->value,
            ])
            ->assertJson([
                'success' => 'Settings have been successfully updated.',
            ]);
    }

    /** @test */
    public function cannot_update_settings_without_authentication()
    {
        $setting = TrackingSetting::factory()->create();
        $newSetting = TrackingSetting::factory()->make();

        $this->patch(route('tracking.settings.update', ['setting' => $setting]), [
                'value' => $newSetting->value,
            ])
            ->assertUnauthorized();
    }

    /** @test */
    public function can_delete_settings_with_authentication()
    {
        $setting = TrackingSetting::factory()->create();

        $this->actingAs(User::factory()->create())
            ->delete(route('tracking.settings.destroy', ['setting' => $setting]))
            ->assertJson([
                'success' => 'Setting has been successfully deleted.',
            ]);
    }

    /** @test */
    public function cannot_delete_settings_without_authentication()
    {
        $setting = TrackingSetting::factory()->create();

        $this->delete(route('tracking.settings.destroy', ['setting' => $setting]))
            ->assertUnauthorized();
    }
}
