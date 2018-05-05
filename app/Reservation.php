<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
  */
  protected $fillable = [
    'nombre',
    'comentarios',
    'fecha_entrada',
    'fecha_salida',
    'precio',
    'room_id'
  ];

	public function extras()
  {
    return $this->belongsToMany(Extra::class);
  }
}
