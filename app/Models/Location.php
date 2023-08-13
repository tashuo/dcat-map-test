<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $location
 * @property string $address
 * @property integer $column_id
 * @property string $created_at
 * @property string $updated_at
 */
class Location extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['location', 'address', 'column_id', 'created_at', 'updated_at'];

    public function column()
    {
        return $this->belongsTo(Column::class, 'column_id', 'id');
    }
}
