<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Pinjaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pinjaman';
    public function peminjam(): BelongsTo
    {
        return $this->belongsTo(Peminjam::class, 'peminjam_id');
    }
}
