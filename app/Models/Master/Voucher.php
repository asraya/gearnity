<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Voucher extends Model
{
    use HasFactory, Uuid;
    protected $fillable = [
        'name_voucher',
        'code_voucher',
        'status',
        'total_redeem',
    ];
    protected $guarded = [];
    public $incrementing = false;


}
