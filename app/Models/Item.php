<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'item_category_id',
        'brand',
        'qty',
        'status',
        'image',
        'remarks',
        'received_by',
    ];

    //status column values
    public const AVAILABLE_STATUS = 1;
    public const HOLD_STATUS = 2;

    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'item_category_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'order_id');
    }
}