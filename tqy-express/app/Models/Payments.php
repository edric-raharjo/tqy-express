<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'payments';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'payment_id';

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
     * We only keep `created_at`, no `updated_at`.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'amount',
        'method',
        'status',
        'created_at',
    ];

    /**
     * Relationship: Payment has many Shipments.
     */
    public function shipments()
    {
        return $this->hasMany(Shipment::class, 'payment_id', 'payment_id');
    }
}
    