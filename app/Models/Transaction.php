<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'date',
        'type',
        'rubbish_code',
        'amount',
        'total_value',
        'customer_number',
        'admin_number',
    ];

    protected $nullable = ['created_at', 'updated_at', 'rubbish_code', 'value'];
}
