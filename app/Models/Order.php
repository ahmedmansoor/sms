<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_id',
        'qty',
        'requested_by',
        'authorised_by',
        'approved_by',
        'received_by',
        'section_id',
        'remarks',
        'status',
        'requested_at',
        'updated_at',
        'approved_at',
        'received_at',
    ];

    //status column values
    public const DRAFT_STATUS = 0;
    public const PENDING_STATUS = 1;
    public const AUTHORISED_STATUS = 2;
    public const APPROVED_STATUS = 3;
    public const REJECTED_STATUS = 4;
    public const HOLD_STATUS = 5;

    // public function orderedItems()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }

    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }


    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function requestedUser()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function authorisedUser()
    {
        return $this->belongsTo(User::class, 'authorised_by');
    }

    public function approvedUser()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}