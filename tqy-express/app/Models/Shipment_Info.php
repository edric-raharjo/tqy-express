<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment_Info extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'shipment_info';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'shipment_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = false;

    /**
     * The data type of the primary key.
     */
    protected $keyType = 'int';

    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'shipment_id',
        'destination',
        'recent_info',
        'recent_location',
        'remarks',
    ];

    /**
     * Relationships
     */
    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'shipment_id', 'shipment_id');
    }
}
