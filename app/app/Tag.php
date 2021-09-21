<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table='tags';
    protected $guarded=[];
    public $timestamps = true;

    public function getBookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
