<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubs extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'hubs';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'hub_id';

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
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'hub_name',
        'city',
        'province',
        'full_address',
        'postal_code',
        'latitude',
        'longitude',
        'hub_type',
        'capacity',
        'phone',
        'manager_name',
        'status',
    ];

    /**
     * Relationships
     */
    public function parcelScans()
    {
        return $this->hasMany(ParcelScan::class, 'hub_id', 'hub_id');
    }
}
