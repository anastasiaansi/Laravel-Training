<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Feedback.
 *
 * @property int $id
 * @property string $name
 * @property string $feedback
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * */
class Feedback extends Model
{
    use HasFactory;

    protected $table = "feedbacks";

    protected $fillable = [
        'name', 'feedback'
    ];
}
