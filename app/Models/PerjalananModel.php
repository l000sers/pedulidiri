<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerjalananModel extends Model
{
    use HasFactory;
     protected $table="perjalanans";
     protected $fillable=['id_user','nama','tanggal','jam','lokasi','suhu'];
}
