<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasUuids;
    protected $fillable = ['no_identitas', 'pegawai_name', 'telpon', 'alamat', 'email', 'file_photo', 'gender'];
}
