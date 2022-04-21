<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $dispatchesEvents = [
        'created' => \App\Events\ProductCreated::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
