<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    //affiche les collonnes suivantes
    protected $visible = ['name'];

    public function films(): MorphToMany
    {
        return $this->morphToMany(Film::class, 'filmable');
    }
}
