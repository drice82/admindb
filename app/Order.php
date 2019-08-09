<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'money', 'trade_no', 'out_trade_no', 'type', 'user_id',
    ];

}
