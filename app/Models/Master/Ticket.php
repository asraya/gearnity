<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Ticket extends Model
{
    use HasFactory, Uuid;
    protected $fillable = [
        'ticket',
        'image',
        'status',
        'slug',
        'user_id'
    ];
    protected $guarded = [];
    public $incrementing = false;
    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
    }
}


