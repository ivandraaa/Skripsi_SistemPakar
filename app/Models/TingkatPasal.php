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
                "pasal" => "Club Rot"
            ],
            [
                "kode_pasal" => "P002",
                "pasal" => "Black Rot"
            ],
            [
                "kode_pasal" => "P003",
                "pasal" => "Downy Mildew"
            ],
            [
                "kode_pasal" => "P004",
                "pasal" => "Leaf Spot"
            ],
            [
                "kode_pasal" => "P005",
                "pasal" => "White Rust"
            ],
        ];
        return $pasal;
    }
}
