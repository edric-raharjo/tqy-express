<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'shipments';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'shipment_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = true;

    /**
     * The data type of the primary key.
     */
    protected $keyType = 'int';

    /**
     * Indicates if the model should be timestamped.
     * (We’re using only `order_date`, not `created_at` & `updated_at`)
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'sender_name',
        'sender_phone',
        'sender_address',
        'receiver_name',
        'receiver_phone',
        'receiver_address',
        'weight',
        'size',
        'service_type',
        'payment_id',
        'status',
        'order_date',
    ];

    /**
     * Relationship: Shipment belongs to a Payment.
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'payment_id');
    }
}
