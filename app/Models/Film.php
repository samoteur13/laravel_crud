<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    protected $fillable = ['title', 'year', 'description', 'category_id'];
    use HasFactory, SoftDeletes;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
