<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
  */
  protected $fillable = [
    'nombre',
    'descripcion',
    'capacidad',
    'precio1',
    'precio2'
  ];

	public function extras()
  {
    return $this->belongsToMany(Extra::class);
  }
}
