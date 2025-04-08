<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $fillable = ['namalengkap', 'instansi', 'no_hp', 'bertemu_dengan', 'keperluan', 'tanggal', 'jam', 'foto'];
}