<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatPenyakit extends Model
{
    use HasFactory;
    protected $table = 'tingkat_penyakit';
    protected $guard = ["id"];
    protected $fillable = ['kode_penyakit', 'penyakit'];

    public function fillTable()
    {
        $penyakit = [
            [
                "kode_penyakit" => "P001",
                "penyakit" => "Club Rot"
            ],
            [
                "kode_penyakit" => "P002",
                "penyakit" => "Black Rot"
            ],
            [
                "kode_penyakit" => "P003",
                "penyakit" => "Downy Mildew"
            ],
            [
                "kode_penyakit" => "P004",
                "penyakit" => "Leaf Spot"
            ],
            [
                "kode_penyakit" => "P005",
                "penyakit" => "White Rust"
            ],
        ];
        return $penyakit;
    }
}
