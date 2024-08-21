<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
       'id_siswa','nisn','nis','nama','kelas_id','alamat','no_telepon','id_spp',
    ];

    // Add a constructor if necessary
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function SiswaKelas()
    {
    	return $this->hasOne(Kelas::class,'id_kelas','kelas_id');
    }

    public function SppSiswa()
    {
    	return $this->hasOne(Spp::class,'id_spp','id_spp');
    }
}
