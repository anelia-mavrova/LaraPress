<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['category_id', 'user_id', 'status', 'title', 'content'];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function author()
    {
        return $this->user();
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getStatusLabelClass()
    {
        switch ($this->status)
        {
            case 'published':
                return 'label-success';
            case 'archived':
                return 'label-warning';
            case 'draft':
                return 'label-default';
            default:
                return 'label-default';
        }
    }

    public function belongsToUser()
    {
        if ($this->user_id == \Auth::user()->id)
            return true;
        return false;
    }
}
