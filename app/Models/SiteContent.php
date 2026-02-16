<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_cta',
        'about_title',
        'about_body',
        'contact_email',
        'contact_phone',
    ];
}
