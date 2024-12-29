<?php

namespace App\Models;

use App\Models\Production\Production;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    use HasUuids;
    protected $fillable = ['no_identitas', 'pegawai_name', 'telpon', 'alamat', 'email', 'file_photo', 'gender'];

    /**
     * Get all of the production for the Pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function production(): HasMany
    {
        return $this->hasMany(Production::class, 'pegawai_id', 'id');
    }
}
