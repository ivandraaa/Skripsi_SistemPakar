<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table = 'gejala';
    protected $guard = ["id"];
    protected $fillable = ["kode_gejala", "gejala"];

    public function fillTable()
    {

// 1-4 = CLub Root
// 5-9 = Black Root
// 9-14 = Downy Mildew

        $gejala2 = [
            [
                "kode_gejala" => "G001",
                "gejala" => "Nodul atau kelenjar yang tidak teratur terbentuk pada akar"
            ],
            [
                "kode_gejala" => "G002",
                "gejala" => "Ada pembengkakan pada akar"
            ],
            [
                "kode_gejala" => "G003",
                "gejala" => "Terjadi pemanjangan akar"
            ],
            [
                "kode_gejala" => "G004",
                "gejala" => "Pertumbuhan tanaman kerdil"
            ],
            [
                "kode_gejala" => "G005",
                "gejala" => "Daun tanaman layu dan mati"
            ],
            [
                "kode_gejala" => "G006",
                "gejala" => "Bintik kuning berbentuk V di sepanjang tepi daun ke arah tengah daun"
            ],
            [
                "kode_gejala" => "G007",
                "gejala" => "Terdapat bintik hitam pada daun"
            ],
            [
                "kode_gejala" => "G008",
                "gejala" => "Daunnya busuk dan berwarna hitam"
            ],
            [
                "kode_gejala" => "G009",
                "gejala" => "Semua daun menguning"
            ],
            [
                "kode_gejala" => "G010",
                "gejala" => "Cairan bakteri muncul pada bagian yang terkena infeksi"
            ],
            [
                "kode_gejala" => "G011",
                "gejala" => "Jaringan di antara pembuluh darah menguning dan kemudian berubah menjadi coklat keunguan"
            ],
            [
                "kode_gejala" => "G012",
                "gejala" => "Bintik hitam dan garis-garis muncul pada batang di bawah bunga kepala"
            ],
            [
                "kode_gejala" => "G013",
                "gejala" => "Kepala bunga berubah menjadi cokelat"
            ],
            [
                "kode_gejala" => "G014",
                "gejala" => "Bagian bawah daun terdapat jamur berwarna putih seperti tepung"
            ],
            [
                "kode_gejala" => "G015",
                "gejala" => "Tekstur daun seperti kertas"
            ],
            [
                "kode_gejala" => "G016",
                "gejala" => "Bintik-bintik kecil, berwarna gelap"
            ],
            [
                "kode_gejala" => "G017",
                "gejala" => "Bintik-bintik membesar, kemudian menjadi melingkar dengan diameter 1mm"
            ],
            [
                "kode_gejala" => "G018",
                "gejala" => "Terdapat berbentuk cincin"
            ],
            [
                "kode_gejala" => "G019",
                "gejala" => "Benih mengerut dan perkecambahan yang buruk terjadi."
            ],
            [
                "kode_gejala" => "G020",
                "gejala" => "Bercak linear juga muncul pada tangkai daun, batang, polong, dan biji"
            ],
            [
                "kode_gejala" => "G021",
                "gejala" => "Bintik-bintik putih yang mengkilap terbentuk di permukaan bawah daun, batang, dan bunga."
            ],
            [
                "kode_gejala" => "G022",
                "gejala" => "Bintik-bintik tersebut bergabung membentuk pola yang tidak teratur."
            ],
            [
                "kode_gejala" => "G023",
                "gejala" => "Lapisan epidermis pecah dan menunjukkan massa spora putih yang membuat bintik tersebut tampak seperti serbuk."
            ],
            [
                "kode_gejala" => "G024",
                "gejala" => "Distorsi pada bagian-bagian bunga akibat pertumbuhan jaringan berlebih."
            ],
            [
                "kode_gejala" => "G025",
                "gejala" => "Tanaman mengalami kelainan bentuk."
            ],
            
            
        ];

        return $gejala2;
    }
}
