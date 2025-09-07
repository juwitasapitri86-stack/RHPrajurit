<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prajurit extends Model
{
    use HasFactory;

    protected $table = 'prajurit'; // nama tabel

    protected $fillable = [
        'nrp',
        'nrpbay',
        'nama',
        'pangkat',
        'korps',
        'dinpang',
        'tmt_tni',
        'tmt_fiktif',
        'dinpra',
        'jab',
        'temhir',
        'tglhir',
        'jk',
        'usia',
        'suku',
        'agama',
        'alamat',
        'lajab',
        'dikum',
        'dikmil',
        'bahasing',
        'bahasada',
        'profesi',
        'riwpang',
        'riwjab',
        'tanja',
        'foto',
    ];
}

