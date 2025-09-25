<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel_Scans extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'parcel_scans';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'scan_id';

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
     * (We only have `scan_time`, not `created_at`/`updated_at`)
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'shipment_id',
        'hub_id',
        'status',
        'scan_time',
        'updated_by',
        'remarks',
    ];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'shipment_id', 'shipment_id');
    }

    public function hub()
    {
        return $this->belongsTo(Hub::class, 'hub_id', 'hub_id');
    }
}
