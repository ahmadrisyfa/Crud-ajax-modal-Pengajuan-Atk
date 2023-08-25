<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table ='pengajuan';
    protected $hidden = ['id'];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
