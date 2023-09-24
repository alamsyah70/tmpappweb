<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaanUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal_pembuatan',
        'driverDropdown',
        'unitDropdown',
        'jam_first',
        'jam_last',
        'km_first',
        'km_last',
        'tujuan_penggunaan',
        'remember'
        ];
    
        public function scopeFilter($query, array $filters)
        {        
            $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('driverDropdown', 'like', '%' . $search . '%')
            ->orWhere('unitDropdown', 'like', '%' . $search . '%')
            ->orWhere('tanggal_pembuatan', 'like', '%' . $search . '%')
            ->orWhere('tujuan_penggunaan', 'like', '%' . $search . '%');
        });
        
        }
}
