<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier_Performances extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'courier_performance';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id';

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
     * (We’re only using custom fields, not Laravel’s created_at/updated_at)
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'courier_id',
        'courier_phone',
        'assign_date',
        'total_assigned',
        'delivered_packages',
        'performance_percentage',
        'last_delivery_time',
        'delivery_status',
    ];

    /**
     * Relationships
     */
    public function courier()
    {
        return $this->belongsTo(User::class, 'courier_id', 'user_id');
    }
}
