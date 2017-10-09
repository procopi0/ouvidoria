<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requests';

    protected $fillable = [
        'user_id',
        'type_id',
        'secretary_id',
        'status',
        'description',
    ];
}
