<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RubbishType extends Model
{
    protected $table = 'rubbish_types';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
    ];

    protected $nullable = ['created_at', 'updated_at'];
}
