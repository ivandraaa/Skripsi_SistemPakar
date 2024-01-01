<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identifikasi extends Model
{
    use HasFactory;
    protected $table = 'identifikasi';
    protected $guard = ["id"];
    protected $fillable = ["kode_identifikasi", "identifikasi"];

    public function fillTable()
    {

// 1-4 = CLub Root
// 5-9 = Black Root
// 9-14 = Downy Mildew

        $identifikasi2 = [
            [
                "kode_identifikasi" => "G001",
                "identifikasi" => "Nodul atau kelenjar yang tidak teratur terbentuk pada akar"
            ],
            [
                "kode_identifikasi" => "G002",
                "identifikasi" => "Ada pembengkakan pada akar"
            ],
            [
                "kode_identifikasi" => "G003",
                "identifikasi" => "Terjadi pemanjangan akar"
            ],
            [
                "kode_identifikasi" => "G004",
                "identifikasi" => "Pertumbuhan tanaman kerdil"
            ],
            [
                "kode_identifikasi" => "G005",
                "identifikasi" => "Daun tanaman layu dan mati"
            ],
            [
                "kode_identifikasi" => "G006",
                "identifikasi" => "Bintik kuning berbentuk V di sepanjang tepi daun ke arah tengah daun"
            ],
            [
                "kode_identifikasi" => "G007",
                "identifikasi" => "Terdapat bintik hitam pada daun"
            ],
            [
                "kode_identifikasi" => "G008",
                "identifikasi" => "Daunnya busuk dan berwarna hitam"
            ],
            [
                "kode_identifikasi" => "G009",
                "identifikasi" => "Semua daun menguning"
            ],
            [
                "kode_identifikasi" => "G010",
                "identifikasi" => "Cairan bakteri muncul pada bagian yang terkena infeksi"
            ],
            [
                "kode_identifikasi" => "G011",
                "identifikasi" => "Jaringan di antara pembuluh darah menguning dan kemudian berubah menjadi coklat keunguan"
            ],
            [
                "kode_identifikasi" => "G012",
                "identifikasi" => "Bintik hitam dan garis-garis muncul pada batang di bawah bunga kepala"
            ],
            [
                "kode_identifikasi" => "G013",
                "identifikasi" => "Kepala bunga berubah menjadi cokelat"
            ],
            [
                "kode_identifikasi" => "G014",
                "identifikasi" => "Bagian bawah daun terdapat jamur berwarna putih seperti tepung"
            ],
            [
                "kode_identifikasi" => "G015",
                "identifikasi" => "Tekstur daun seperti kertas"
            ],
            [
                "kode_identifikasi" => "G016",
                "identifikasi" => "Bintik-bintik kecil, berwarna gelap"
            ],
            [
                "kode_identifikasi" => "G017",
                "identifikasi" => "Bintik-bintik membesar, kemudian menjadi melingkar dengan diameter 1mm"
            ],
            [
                "kode_identifikasi" => "G018",
                "identifikasi" => "Terdapat berbentuk cincin"
            ],
            [
                "kode_identifikasi" => "G019",
                "identifikasi" => "Benih mengerut dan perkecambahan yang buruk terjadi."
            ],
            [
                "kode_identifikasi" => "G020",
                "identifikasi" => "Bercak linear juga muncul pada tangkai daun, batang, polong, dan biji"
            ],
            [
                "kode_identifikasi" => "G021",
                "identifikasi" => "Bintik-bintik putih yang mengkilap terbentuk di permukaan bawah daun, batang, dan bunga."
            ],
            [
                "kode_identifikasi" => "G022",
                "identifikasi" => "Bintik-bintik tersebut bergabung membentuk pola yang tidak teratur."
            ],
            [
                "kode_identifikasi" => "G023",
                "identifikasi" => "Lapisan epidermis pecah dan menunjukkan massa spora putih yang membuat bintik tersebut tampak seperti serbuk."
            ],
            [
                "kode_identifikasi" => "G024",
                "identifikasi" => "Distorsi pada bagian-bagian bunga akibat pertumbuhan jaringan berlebih."
            ],
            [
                "kode_identifikasi" => "G025",
                "identifikasi" => "Tanaman mengalami kelainan bentuk."
            ],
            
            
        ];

        return $identifikasi2;
    }
}
