<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'user_id',
        'title',
        'permalink',
        'body',
        'short_description',
        'cover_image',
        'published_at',
        'published',
    ];

    /**
     * Create permalink from title
     *
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['permalink'] = str_slug($value);
    }

    /**
     * Generate a short description of the post
     *
     * @param $value
     */
    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = $value;
        $this->attributes['short_description'] = $this->getFirstParagraph($value);
    }

    public function getFirstParagraph($text)
    {
        preg_match('/<p>(.*?)<\/p>/i', $text, $paragraphs);

        return $paragraphs[0];
    }

    /**
     * Get all published posts and order them by creation date (descending)
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->wherePublished(true)->orderBy('created_at', 'desc');
    }

    /**
     * Show a specific post with the given date and permalink
     *
     * @param $query
     * @param $date
     * @param $permalink
     *
     * @return mixed
     */
    public function scopeShow($query, $date, $permalink)
    {
        return $query->whereDate('created_at', $date)->wherePermalink($permalink);
    }

    /**
     * Check ownership
     *
     * @param $query
     * @param $post
     *
     * @return bool
     */
    public function scopeOwner($query, $post)
    {
        return $post->user_id == auth()->user()->id;
    }

    /**
     * A post has one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
