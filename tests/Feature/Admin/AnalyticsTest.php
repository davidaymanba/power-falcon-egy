<?php

namespace Tests\Feature\Admin;

use App\Models\SiteVisit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnalyticsTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_are_tracked(): void
    {
        $this->get(route('home'))
            ->assertOk();

        $this->assertDatabaseHas('site_visits', [
            'method' => 'GET',
            'path' => '/',
            'route_name' => 'home',
        ]);
    }

    public function test_admin_pages_are_not_tracked(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->get(route('admin.analytics.index'))
            ->assertOk();

        $this->assertDatabaseCount('site_visits', 0);
    }

    public function test_admin_can_view_analytics_summary(): void
    {
        $admin = User::factory()->create();

        SiteVisit::query()->create([
            'visitor_id' => '74ac7e15-bd12-4789-bc96-f61e0d753f95',
            'ip_address' => '127.0.0.1',
            'method' => 'GET',
            'path' => '/products',
            'url' => 'http://localhost/products',
            'route_name' => 'products',
            'user_agent' => 'Mozilla/5.0 Chrome/120.0',
            'visited_at' => now(),
        ]);

        SiteVisit::query()->create([
            'visitor_id' => 'd75eb929-3beb-4da6-a1e3-17fa856d67dc',
            'ip_address' => '127.0.0.2',
            'method' => 'GET',
            'path' => '/about',
            'url' => 'http://localhost/about',
            'route_name' => 'about',
            'user_agent' => 'Mozilla/5.0 Safari/605.1',
            'visited_at' => now(),
        ]);

        $this->actingAs($admin)
            ->get(route('admin.analytics.index'))
            ->assertOk()
            ->assertSee('Analytics')
            ->assertSee('/products')
            ->assertSee('/about')
            ->assertSee('Chrome')
            ->assertSee('Safari');
    }
}
