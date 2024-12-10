<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'icon',
        'address',
        'hotline',
        'map',
        'email',
        'title_seo',
        'description_seo',
        'keywords_seo'
    ];
}
