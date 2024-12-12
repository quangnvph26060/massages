<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'logo',
        'icon',
        'title_base',
        'address',
        'hotline',
        'map',
        'email',
        'title_seo',
        'description_seo',
        'keywords_seo'
    ];

    protected $casts = [
        'map' => 'array',
        'hotline' => 'array',
        'address' => 'array',
        'title_base' => 'array',
    ];
}
