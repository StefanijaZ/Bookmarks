<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{

    protected $table='bookmarks';
    protected $guarded=[];
    public $timestamps = true;

    public function getTag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
