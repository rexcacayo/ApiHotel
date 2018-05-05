<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
  */
  protected $fillable = [
    'nombre',
    'descripcion',
    'precio1',
    'precio2'
  ];

	public function extras()
  {
    return $this->belongsToMany(Extra::class);
  }
}
