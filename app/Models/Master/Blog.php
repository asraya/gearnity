<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Blog extends Model
{
    use HasFactory, Uuid;
    protected $fillable = [
        'name',
        'image',
        'slug'
    ];
    protected $guarded = [];
    public $incrementing = false;
    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
