<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_warga extends Model
{
    use HasFactory;

    protected $table = 'data_wargas';
    protected $primaryKey = 'id_warga';

    protected $fillable = [
        'NIK',
        'KK',
        'username',
        'password',
        'nama_depan',
        'nama_belakang',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_perkawinan',
        'status_hubungan',
        'pekerjaan',
        'tipe_warga',
        'role',
        'jenis_kelamin',
        'golongan_darah',
        'alamat',
    ];
}
