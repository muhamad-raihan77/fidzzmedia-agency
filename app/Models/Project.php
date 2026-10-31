<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'image',
        'tech_stacks',
        'demo_url',
        'repo_url',
        'sort_order',
        'is_featured',
        'is_published',
    ];

    protected $casts = [
        'tech_stacks' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(public_path('storage/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
        if ($this->image && (str_starts_with($this->image, 'http') || str_starts_with($this->image, '/'))) {
            return $this->image;
        }
        // Fallback default placeholder
        return asset('images/projects/' . ($this->slug ?? 'default') . '.jpg');
    }
}

