<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order.
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * */
class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        'name', 'phone', 'email', 'info'
    ];
}
