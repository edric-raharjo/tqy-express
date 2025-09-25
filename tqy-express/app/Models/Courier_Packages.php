<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierPackage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'courier_packages';

    /**
     * No auto-increment ID (we use composite PK).
     */
    public $incrementing = false;

    /**
     * Disable default timestamps (we only use assign_date).
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'courier_id',
        'shipment_id',
        'assign_date',
    ];

    /**
     * Relationships
     */
    public function courier()
    {
        return $this->belongsTo(User::class, 'courier_id', 'user_id');
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'shipment_id', 'shipment_id');
    }
}
