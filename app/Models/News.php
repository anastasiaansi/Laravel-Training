<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\News.
 *
 * @property int $id
 * @property string $title
 * @property string $short_description
 * @property string $description
 * @property string $image
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category[]|null $category
 * @property-read \App\Models\Author[]|null $author
 * */
class News extends Model
{
    use HasFactory;
    //    protected $guarded = [
//        'id'
//    ];

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'status',
        'category_id',
        'author_id'
    ];

    /**
     * One-To-Many: One category may belong to one news.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * One-To-Many: One category may belong to one news.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }


}
