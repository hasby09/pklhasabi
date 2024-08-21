<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use SoftDeletes;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pembayaran','nisn','tgl_bayar','bln_bayar','tahun_bayar','id_spp','jumlah_bayar'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function PembayaranSpp()
    {
    	return $this->hasOne(Spp::class,'id_spp','id_spp');
    }
}
