<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user_created',
        'id_contract',
        'id_type_of_contract',
        'id_local',
        'requester',
        'description'
    ];
}
