<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';

    protected $fillable = [
        'nama_kelas','kompetensi_keahlian'
    ];

    // Add a constructor if necessary
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}