<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network_Routes extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'network_routes';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'route_id';

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
        'origin_hub',
        'destination_hub',
        'current_hub',
        'next_hub',
        'distance_km',
        'estimated_time_hours',
    ];

    /**
     * Relationships
     */
    public function origin()
    {
        return $this->belongsTo(Hub::class, 'origin_hub', 'hub_id');
    }

    public function destination()
    {
        return $this->belongsTo(Hub::class, 'destination_hub', 'hub_id');
    }

    public function current()
    {
        return $this->belongsTo(Hub::class, 'current_hub', 'hub_id');
    }

    public function next()
    {
        return $this->belongsTo(Hub::class, 'next_hub', 'hub_id');
    }
}
