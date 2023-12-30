<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keputusan extends Model
{
    use HasFactory;
    protected $table = 'keputusan';
    protected $guard = ["id"];

    public function penyakit()
    {
        return $this->hasMany(TingkatPenyakit::class, 'kode_penyakit', 'kode_penyakit');
    }
    public function gejala()
    {
        return $this->hasMany(Gejala::class, 'kode_gejala' /* tbl gejala */, 'kode_gejala');
    }

// 1-4 = CLub Root
// 5-9 = Black Root
// 10-14 = Downy Mildew

    public function fillTable()
    {
        $rule = [
            [
                'kode_penyakit' => 'P001',
                'kode_gejala' => 'G001',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P001',
                'kode_gejala' => 'G002',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_penyakit' => 'P001',
                'kode_gejala' => 'G003',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P001',
                'kode_gejala' => 'G004',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P001',
                'kode_gejala' => 'G005',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P002',
                'kode_gejala' => 'G006',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P002',
                'kode_gejala' => 'G007',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_penyakit' => 'P002',
                'kode_gejala' => 'G008',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P002',
                'kode_gejala' => 'G009',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_penyakit' => 'P002',
                'kode_gejala' => 'G010',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_penyakit' => 'P003',
                'kode_gejala' => 'G011',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_penyakit' => 'P003',
                'kode_gejala' => 'G012',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P003',
                'kode_gejala' => 'G013',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P003',
                'kode_gejala' => 'G014',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P003',
                'kode_gejala' => 'G015',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_penyakit' => 'P004',
                'kode_gejala' => 'G016',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P004',
                'kode_gejala' => 'G017',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_penyakit' => 'P004',
                'kode_gejala' => 'G018',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_penyakit' => 'P004',
                'kode_gejala' => 'G019',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P004',
                'kode_gejala' => 'G020',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P005',
                'kode_gejala' => 'G021',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P005',
                'kode_gejala' => 'G022',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_penyakit' => 'P005',
                'kode_gejala' => 'G023',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_penyakit' => 'P005',
                'kode_gejala' => 'G024',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_penyakit' => 'P005',
                'kode_gejala' => 'G025',
                'mb' => 0.6,
                'md' => 0.4
            ],
        ];
        return $rule;
    }
}
