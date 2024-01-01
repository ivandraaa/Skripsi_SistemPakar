<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keputusan extends Model
{
    use HasFactory;
    protected $table = 'keputusan';
    protected $guard = ["id"];

    public function pasal()
    {
        return $this->hasMany(TingkatPasal::class, 'kode_pasal', 'kode_pasal');
    }
    public function identifikasi()
    {
        return $this->hasMany(Identifikasi::class, 'kode_identifikasi' /* tbl identifikasi */, 'kode_identifikasi');
    }

// 1-4 = CLub Root
// 5-9 = Black Root
// 10-14 = Downy Mildew

    public function fillTable()
    {
        $rule = [
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G001',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G002',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G003',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G004',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G005',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G006',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G007',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G008',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G009',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G010',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G011',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G012',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G013',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G014',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G015',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G016',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G017',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G018',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G019',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G020',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G021',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G022',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G023',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G024',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G025',
                'mb' => 0.6,
                'md' => 0.4
            ],
        ];
        return $rule;
    }
}
