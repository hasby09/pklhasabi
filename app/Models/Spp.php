<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spp extends Model{
    use SoftDeletes;

    protected $table = 'spp';
    protected $primaryKey = 'id_spp';

    protected $fillable = [
        'tahun','nominal'
    ];

    // Add a constructor if necessary
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

}