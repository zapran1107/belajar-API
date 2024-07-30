<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klub extends Model
{
    use HasFactory;
    protected $fillable = ['nama_klub', 'logo', 'id_liga'];

    public function liga()
    {
        return $this->belongsTo(Liga::class, 'id_liga');
    }

    public function klub()
    {
        return $this->belongsTo(Klub::class, 'id_klub');
    }

    public function fan()
    {
        return $this->belongsToMany(Fan::class, 'fan_klub', 'id_klub', 'id_fan');
    }
}
