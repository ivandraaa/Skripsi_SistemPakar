<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatPasal extends Model
{
    use HasFactory;
    protected $table = 'tingkat_pasal';
    protected $guard = ["id"];
    protected $fillable = ['kode_pasal', 'pasal'];

    public function fillTable()
    {
        $pasal = [
            [
                "kode_pasal" => "P001",
                "pasal" => "Pasal 310 Ayat 1"
            ],
            [
                "kode_pasal" => "P002",
                "pasal" => "Pasal 310 Ayat 2"
            ],
            [
                "kode_pasal" => "P003",
                "pasal" => "Pasal 310 Ayat 3"
            ],
            [
                "kode_pasal" => "P004",
                "pasal" => "Pasal 311 Ayat 1"
            ],
            [
                "kode_pasal" => "P005",
                "pasal" => "Pasal 311 Ayat 2"
            ],
            [
                "kode_pasal" => "P006",
                "pasal" => "Pasal 311 Ayat 3"
            ],
            [
                "kode_pasal" => "P007",
                "pasal" => "Pasal 311 Ayat 4"
            ],
        ];
        return $pasal;
    }
}
