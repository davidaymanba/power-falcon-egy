<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable([
    'visitor_id',
    'ip_address',
    'method',
    'path',
    'url',
    'route_name',
    'referer',
    'user_agent',
    'visited_at',
])]
class SiteVisit extends Model
{
    protected function casts(): array
    {
        return [
            'visited_at' => 'datetime',
        ];
    }

    public function getBrowserNameAttribute(): string
    {
        $userAgent = $this->user_agent ?? '';

        return match (true) {
            Str::contains($userAgent, 'Edg/') => 'Edge',
            Str::contains($userAgent, 'Chrome/') => 'Chrome',
            Str::contains($userAgent, 'Safari/') && ! Str::contains($userAgent, 'Chrome/') => 'Safari',
            Str::contains($userAgent, 'Firefox/') => 'Firefox',
            Str::contains($userAgent, 'OPR/') || Str::contains($userAgent, 'Opera') => 'Opera',
            default => 'Unknown',
        };
    }

    public function getDeviceNameAttribute(): string
    {
        $userAgent = $this->user_agent ?? '';

        return match (true) {
            Str::contains($userAgent, ['iPad', 'Tablet']) => 'Tablet',
            Str::contains($userAgent, ['Mobile', 'Android', 'iPhone']) => 'Mobile',
            $userAgent !== '' => 'Desktop',
            default => 'Unknown',
        };
    }
}
