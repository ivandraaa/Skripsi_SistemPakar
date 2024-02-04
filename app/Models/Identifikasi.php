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

        $identifikasi2 = [
            [
                "kode_identifikasi" => "G001",
                "identifikasi" => "dengan kondisi jalan yang ada di TKP dapat mengakibatkan kecelakaan?"
            ],
            [
                "kode_identifikasi" => "G002",
                "identifikasi" => "anda yakin bahwa cuaca saat kejadian memengaruhi kecelakaan?"
            ],
            [
                "kode_identifikasi" => "G003",
                "identifikasi" => "anda mengendarai kendaraan dengan kecepatan tinggi sebelum terjadi kecelakaan?"
            ],
            [
                "kode_identifikasi" => "G004",
                "identifikasi" => "anda sudah mahir mengendarai kendaraan?"
            ],
            [
                "kode_identifikasi" => "G005",
                "identifikasi" => "anda mengalami gangguan atau kelalaian dan tidak fokus pada saat mengemudi?"
            ],
            [
                "kode_identifikasi" => "G006",
                "identifikasi" => "anda mengetahui kondisi kendaraan anda layak untuk digunakan?"
            ],
            [
                "kode_identifikasi" => "G007",
                "identifikasi" => "kendaraan yang anda kendarai kelebihan muatan?"
            ],
            [
                "kode_identifikasi" => "G008",
                "identifikasi" => "anda menyalakan lampu hazard pada saat kendaraan mengalami mati mesin?"
            ],
            [
                "kode_identifikasi" => "G009",
                "identifikasi" => "anda yakin bahwa sistem rem kendaraan berfungsi dengan baik?"
            ],
            [
                "kode_identifikasi" => "G010",
                "identifikasi" => "anda mengaktifkan rem tangan pada saat kendaraan mogok?"
            ],
            [
                "kode_identifikasi" => "G011",
                "identifikasi" => "tali yang digunakan untuk menarik kendaraan anda memang dipergunakan untuk menarik kendaraan?"
            ],
            [
                "kode_identifikasi" => "G012",
                "identifikasi" => "anda mengetahui penyebab terjadinya mogok pada kendaraan anda?"
            ],
            [
                "kode_identifikasi" => "G013",
                "identifikasi" => "anda tahu di belakang kendaraan anda ada beberapa kendaraan lain?"
            ],
            [
                "kode_identifikasi" => "G014",
                "identifikasi" => "pada saat tali yang menarik kendaraan anda putus dan kendaraan anda mundur kebelakang menabrak kendaraan lain?"
            ],
            [
                "kode_identifikasi" => "G015",
                "identifikasi" => "kecelakaan yang dialami mengakibatkan kerusakan pada kendaraan?"
            ],
            [
                "kode_identifikasi" => "G016",
                "identifikasi" => "selain kendaraan yang rusak karena tertabrak, ada korban yang mengalami luka ringan?"
            ],
            [
                "kode_identifikasi" => "G017",
                "identifikasi" => "anda memperlambat laju kendaraan anda saat melihat korban akan menyeberang jalan?"
            ],
            [
                "kode_identifikasi" => "G018",
                "identifikasi" => "pada saat menyebrang korban berjalan kaki?"
            ],
            [
                "kode_identifikasi" => "G019",
                "identifikasi" => "anda tidak memperhatikan/melihat ketika korban hendak menyeberang jalan?"
            ],
            [
                "kode_identifikasi" => "G020",
                "identifikasi" => "anda tahu jarak antara korban dengan anda sebelum terjadi kecelakaan sudah cukup dekat?"
            ],
            [
                "kode_identifikasi" => "G021",
                "identifikasi" => "kecelakaan ini melibatkan beberapa kendaraan lain?"
            ],
            [
                "kode_identifikasi" => "G022",
                "identifikasi" => "anda sedang dalam keadaan terburu-buru sehingga menyebabkan kelalain saat mengemudikan kendaraan?"
            ],
            [
                "kode_identifikasi" => "G023",
                "identifikasi" => "anda tahu bahwa kendaraan yang berada di depannya sedang mengurangi kecepatan?"
            ],
            [
                "kode_identifikasi" => "G024",
                "identifikasi" => "anda bermaksud menghindari kecelakaan dengan mengambil jalur arah berlawanan?"
            ],
            [
                "kode_identifikasi" => "G025",
                "identifikasi" => "anda melihat kendaraan yang dikendarai oleh korban datang dari arah berlawanan?"
            ],
            [
                "kode_identifikasi" => "G026",
                "identifikasi" => "anda tidak dapat menghindari kendaraan yang datang dari arah berlawanan tersebut?"
            ],
            [
                "kode_identifikasi" => "G027",
                "identifikasi" => "anda tahu karena kecelakaan tersebut mengakibatkan korban mengalami luka berat?"
            ],
            [
                "kode_identifikasi" => "G028",
                "identifikasi" => "anda mengendarai kendaraan secara zig-zag?"
            ],
            [
                "kode_identifikasi" => "G029",
                "identifikasi" => "anda menyalip di jalur yang tidak diperbolehkan, seperti di luar marka?"
            ],
            [
                "kode_identifikasi" => "G030",
                "identifikasi" => "anda terlibat dalam balapan liar di jalan raya?"
            ],
            [
                "kode_identifikasi" => "G031",
                "identifikasi" => "anda melakukan aksi berbahaya di jalan raya?"
            ],
            [
                "kode_identifikasi" => "G032",
                "identifikasi" => "anda melakukan perilaku ugal-ugalan di jalan raya yang membahayakan pengendara lain?"
            ],
            [
                "kode_identifikasi" => "G033",
                "identifikasi" => "anda memperhatikan/mematuhi rambu-rambu lalu lintas di jalan raya?"
            ],
            [
                "kode_identifikasi" => "G034",
                "identifikasi" => "anda tidak menjaga jarak yang aman dengan kendaraan di depan?"
            ],
            [
                "kode_identifikasi" => "G035",
                "identifikasi" => "anda mengetahui bahwa kendaraan tersebut tidak memiliki dokumen perjalanan yang lengkap?"
            ],
            [
                "kode_identifikasi" => "G036",
                "identifikasi" => "anda melakukan pemeriksaan rutin atau perawatan yang dilakukan pada kendaraan tersebut sebelum digunakan?"
            ],
            [
                "kode_identifikasi" => "G037",
                "identifikasi" => "anda mencoba menggunakan rem tangan saat rem utama tidak berfungsi?"
            ],
            [
                "kode_identifikasi" => "G038",
                "identifikasi" => "anda sedang mengonsumsi obat yang mengakibatkan mengantuk/tidak fokus saat mengemudi?"
            ],
            [
                "kode_identifikasi" => "G039",
                "identifikasi" => "anda mengetahui kondisi kelistrikan (lampu utama dan lampu sein) pada kendaraan anda tidak berfungsi dengan baik?"
            ],
            [
                "kode_identifikasi" => "G040",
                "identifikasi" => "anda sudah memperhitungkan kecepatan dan jarak kendaraan pada saat mendahului kendaraan lain?"
            ],
            [
                "kode_identifikasi" => "G041",
                "identifikasi" => "anda mengetahui kerusakan kendaraan yang terjadi akibat peristiwa kecelakaan tersebut?"
            ],
            [
                "kode_identifikasi" => "G042",
                "identifikasi" => "anda mengendarai kendaraan sudah sesuai dengan jalur yang seharusnya dilalui?"
            ],
            [
                "kode_identifikasi" => "G043",
                "identifikasi" => "terdapat korban yang mengalami luka ringan selain dari kendaraan yang rusak?"
            ],
            [
                "kode_identifikasi" => "G044",
                "identifikasi" => "anda mengemudi dalam keadaan mabuk atau terpengaruh obat-obatan terlarang?"
            ],
            [
                "kode_identifikasi" => "G045",
                "identifikasi" => "anda mengetahui kondisi lalu lintas pada saat anda mengendarai kendaraan dalam keadaan ramai?"
            ],
            [
                "kode_identifikasi" => "G046",
                "identifikasi" => "anda mengetahui akibat dari kecelakaan tersebut ada korban yang mengalami patah kaki dan tangan?"
            ],
            [
                "kode_identifikasi" => "G047",
                "identifikasi" => "kendaraan yang dikendarai oleh anda masuk ke jalur lawan arah sebelum terjadi kecelakaan?"
            ],
            [
                "kode_identifikasi" => "G048",
                "identifikasi" => "akibat dari kelalaian anda dalam mengemudikan kendaraan menyebabkan korban meninggal dunia?"
            ],
            [
                "kode_identifikasi" => "G049",
                "identifikasi" => "korban meninggal dunia sebagai akibat dari tindakan anda yang disengaja menimbulkan kecelakaan?"
            ],
        ];

        return $identifikasi2;
    }
}
