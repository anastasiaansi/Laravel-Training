<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Resources
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $link
 * @property string $guid
 * @property \Illuminate\Support\Carbon|null $pub_date
 */
class Resources extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'link', 'description', 'guid', 'pub_date'];


}