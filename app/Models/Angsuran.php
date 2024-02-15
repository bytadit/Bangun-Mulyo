<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Angsuran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function pinjamanAnggota(): BelongsTo
    {
        return $this->belongsTo(PinjamanAnggota::class, 'pinjaman_anggota_id');
    }
}
