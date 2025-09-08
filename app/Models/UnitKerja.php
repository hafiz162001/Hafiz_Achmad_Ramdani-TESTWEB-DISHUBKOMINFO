<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $fillable = ['unit_kerja', 'skpd_id'];

    public function skpd()
    {
        return $this->belongsTo(Skpd::class);
    }
}
