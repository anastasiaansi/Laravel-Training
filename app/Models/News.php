<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News.
 *
 * @property int $id
 * @property string $title
 * @property string $short_description
 * @property string $description
 * @property string $slug
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Categorie[] $categorie
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Author[] $author
 * */
class News extends Model
{
    use HasFactory;
    protected $table = 'news';

}
