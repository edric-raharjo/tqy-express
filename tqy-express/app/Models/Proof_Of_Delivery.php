<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proof_Of_Delivery extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'proof_of_delivery';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'pod_id';

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
     * (We only use `delivered_at`)
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'shipment_id',
        'courier_id',
        'received_by',
        'signature',
        'photo',
        'delivered_at',
    ];

    /**
     * Relationships
     */
    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'shipment_id', 'shipment_id');
    }

    public function courier()
    {
        return $this->belongsTo(User::class, 'courier_id', 'user_id');
    }
}
