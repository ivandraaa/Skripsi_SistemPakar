<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keputusan extends Model
{
    use HasFactory;
    protected $table = 'keputusan';
    protected $guard = ["id"];
    protected $fillable = ["kode_identifikasi", "kode_pasal", 'mb', 'md'];

    public function pasal()
    {
        return $this->hasMany(TingkatPasal::class, 'kode_pasal', 'kode_pasal');
    }
    public function identifikasi()
    {
        return $this->hasMany(Identifikasi::class, 'kode_identifikasi' /* tbl identifikasi */, 'kode_identifikasi');
    }

    public function fillTable()
    {
        $rule = [
            // Pasal 310 Ayat 1
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G001',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G002',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G003',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G005',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G006',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G007',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G008',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G009',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G010',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G011',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G012',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G013',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G014',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G015',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G016',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G021',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G022',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G023',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G024',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G025',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G026',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G033',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G036',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G037',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G040',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G041',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P001',
                'kode_identifikasi' => 'G043',
                'mb' => 0.2,
                'md' => 0.8
            ],
            // Pasal 310 Ayat 2
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G001',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G002',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G003',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G005',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G006',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G007',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G008',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G009',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G010',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G011',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G012',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G013',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G014',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G015',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G016',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G017',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G018',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G019',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G020',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G021',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G022',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G023',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G024',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G025',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G026',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G033',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G036',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G037',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G040',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G041',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P002',
                'kode_identifikasi' => 'G043',
                'mb' => 0.6,
                'md' => 0.4
            ],
            // Pasal 310 Ayat 3
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G001',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G002',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G003',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G005',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G006',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G007',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G008',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G009',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G010',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G011',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G012',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G013',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G014',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G017',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G018',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G019',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G020',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G021',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G022',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G023',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G024',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G025',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G026',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G027',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G033',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G036',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G037',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G040',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P003',
                'kode_identifikasi' => 'G046',
                'mb' => 0.6,
                'md' => 0.4
            ],
            // Pasal 311 Ayat 1
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G003',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G004',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G006',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G021',
                'mb' => 0,
                'md' => 1
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G028',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G029',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G030',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G031',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G032',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G033',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G034',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G035',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G036',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G038',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G039',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G040',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G042',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G044',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G045',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P004',
                'kode_identifikasi' => 'G047',
                'mb' => 0.2,
                'md' => 0.8
            ],
            // Pasal 311 Ayat 2
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G003',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G004',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G006',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G015',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G021',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G028',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G029',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G030',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G031',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G032',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G033',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G034',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G035',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G036',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G038',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G039',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G040',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G041',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G042',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G044',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G045',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P005',
                'kode_identifikasi' => 'G047',
                'mb' => 0.6,
                'md' => 0.4
            ],
            // Pasal 311 Ayat 3
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G003',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G004',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G006',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G015',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G016',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G017',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G018',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G019',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G020',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G021',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G028',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G029',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G030',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G031',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G032',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G033',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G034',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G035',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G036',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G038',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G039',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G040',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G041',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G042',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G043',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G044',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G045',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P006',
                'kode_identifikasi' => 'G047',
                'mb' => 0.4,
                'md' => 0.6
            ],
            // Pasal 311 Ayat 3
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G003',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G004',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G006',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G017',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G018',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G019',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G020',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G021',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G027',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G028',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G029',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G030',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G031',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G032',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G033',
                'mb' => 0.2,
                'md' => 0.8
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G034',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G035',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G036',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G038',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G039',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G040',
                'mb' => 0.2,
                'md' => 0.4
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G042',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G044',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G045',
                'mb' => 0.4,
                'md' => 0.6
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G046',
                'mb' => 1,
                'md' => 0
            ],
            [
                'kode_pasal' => 'P007',
                'kode_identifikasi' => 'G047',
                'mb' => 0.6,
                'md' => 0.4
            ],
        ];
        return $rule;
    }
}
