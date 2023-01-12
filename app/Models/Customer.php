<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'address',
        'gender',
        'card_number',
    ];

    protected $nullable = ['created_at', 'updated_at'];
}
