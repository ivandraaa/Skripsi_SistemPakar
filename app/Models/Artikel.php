<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $fillable = ["isi", "judul", "kode_penyakit", "id_gambar", "url_gambar"];

    public function penyakit()
    {
        return $this->belongsTo(TingkatPenyakit::class, 'kode_penyakit', 'kode_penyakit');
    }

    public function fillTabel()
    {
        $artikel = [
            [
                "kode_penyakit" => "P001",
                "url_gambar" => 'https://pnwhandbooks.org/sites/pnwhandbooks/files/plant/images/broccoli-brassica-oleracea-clubroot/clubroot.jpg',
                "judul" => 'Club Rot',
                "isi" => 'Penyakit tumbuhan brokoli yang dikenal sebagai club rot adalah suatu penyakit yang disebabkan oleh infeksi jamur Sclerotinia sclerotiorum. Penyakit ini dapat menyerang berbagai jenis tanaman, termasuk brokoli. Club rot biasanya mempengaruhi batang, akar, dan daun brokoli, menyebabkan kerusakan yang signifikan pada tanaman. Gejala utama club rot pada brokoli termasuk penurunan pertumbuhan, busuk pada pangkal batang, dan daun-daun yang layu. Ketika batang brokoli terinfeksi, akan terbentuk jaringan busuk yang lembek dan berwarna coklat. Daun-daun yang terinfeksi juga bisa menunjukkan tanda-tanda busuk dengan area berwarna coklat atau putih keabu-abuan yang meluas. Pada tahap infeksi yang lebih lanjut, sklerotia dapat terlihat pada jaringan yang terinfeksi. Pencegahan dan pengendalian club rot pada brokoli melibatkan beberapa langkah. Berikut adalah beberapa tindakan yang dapat diambil:

                    Menanam varietas brokoli yang tahan terhadap club rot.
                    Menghindari luka-luka pada tanaman saat penanaman dan pemeliharaan.
                    Menerapkan rotasi tanaman untuk menghindari penumpukan sklerotia di tanah.
                    Mencabut dan memusnahkan tanaman yang terinfeksi untuk mencegah penyebaran penyakit.
                    Menggunakan metode sanitasi yang baik, seperti membersihkan peralatan pertanian yang terkontaminasi.
                    Menggunakan fungisida yang direkomendasikan oleh ahli pertanian jika diperlukan.'
            ],
            [
                "kode_penyakit" => "P002",
                "url_gambar" => 'https://extension.umn.edu/sites/extension.umn.edu/files/cabbage-black-rot.jpg',
                "judul" => 'Black Rot',
                "isi" => 'Penyakit tumbuhan brokoli yang dikenal sebagai black rot adalah suatu penyakit yang disebabkan oleh bakteri bernama Xanthomonas campestris pv. campestris. Penyakit ini dapat menyerang tanaman brokoli dan tanaman keluarga kubis-kubisan lainnya. Black rot dapat menyebabkan kerusakan yang signifikan pada tanaman, terutama pada daun dan kuncup bunga. Gejala utama black rot pada brokoli termasuk munculnya bintik-bintik kecil berwarna kuning pada daun yang kemudian memperluas menjadi lesi berwarna coklat atau hitam dengan tepi yang tegas. Lesi-lesi ini sering memiliki bentuk segitiga dengan ujung mengarah ke arah tulang daun. Daun-daun yang terinfeksi dapat mengering, melengkung, dan akhirnya layu. Jika infeksi berlanjut, lesi dapat menyebar ke batang dan kepala brokoli, menyebabkan busuk dan pembusukan yang lebih lanjut. Pencegahan dan pengendalian black rot pada brokoli melibatkan beberapa langkah. 
                
                Berikut adalah beberapa tindakan yang dapat diambil:

                    Menanam varietas brokoli yang tahan terhadap black rot.
                    Memastikan kebersihan di kebun dengan membersihkan sisa-sisa tanaman yang terinfeksi.
                    Menerapkan rotasi tanaman untuk menghindari penumpukan bakteri di tanah.
                    Menghindari cedera pada tanaman saat penanaman dan pemeliharaan.
                    Menghindari penggenangan air dan memastikan drainase yang baik.
                    Menggunakan metode sanitasi yang baik, seperti membersihkan peralatan pertanian yang terkontaminasi.
                    Menggunakan fungisida atau bakterisida yang direkomendasikan oleh ahli pertanian jika diperlukan.'
            ],
            [
                "kode_penyakit" => "P003",
                "url_gambar" => 'https://pnwhandbooks.org/sites/pnwhandbooks/files/plant/images/broccoli-brassica-oleracea-downy-mildew-staghead/249.jpg',
                "judul" => 'Downy Mildew',
                "isi" => 'Penyakit tumbuhan brokoli yang dikenal sebagai Downy Mildew disebabkan oleh jamur-like oomycete bernama Peronospora parasitica. Penyakit ini dapat menyebabkan kerusakan pada daun dan menyebabkan penurunan pertumbuhan serta hasil panen yang rendah pada tanaman brokoli. Gejala penyakit Downy Mildew pada brokoli biasanya dimulai dengan munculnya bercak-bercak kuning atau kehijauan pada permukaan bawah daun. Bercak-bercak ini berkembang menjadi daerah berbulu yang berwarna keabu-abuan atau ungu pada daun. Bulu-bulu tersebut terdiri dari struktur jamur yang berfungsi untuk menyebar spora penyakit. 
                
                Pencegahan dan pengendalian penyakit Downy Mildew pada brokoli melibatkan beberapa langkah berikut:

                    Menanam varietas brokoli yang tahan terhadap Downy Mildew.
                    Menghindari kelembaban yang berlebihan dengan memastikan adanya drainase yang baik.
                    Memberikan ruang yang cukup antara tanaman brokoli untuk meningkatkan sirkulasi udara dan mengurangi kelembaban.
                    Menghindari penyiraman di malam hari untuk mengurangi kelembaban pada daun.
                    Memotong dan membuang bagian tanaman yang terinfeksi segera setelah gejalanya terlihat.
                    Menerapkan rotasi tanaman dan menghindari penanaman berdekatan dengan tanaman keluarga kubis-kubisan lainnya.
                    Menggunakan fungisida atau oomyceticida yang direkomendasikan oleh ahli pertanian jika diperlukan.'
            ],
            [
                "kode_penyakit" => "P004",
                "url_gambar" => 'https://bpb-us-e1.wpmucdn.com/blogs.cornell.edu/dist/1/7446/files/2018/08/Summer-2013-075-1wuy93u.jpg',
                "judul" => 'Leaf Spot',
                "isi" => 'Penyakit tumbuhan brokoli yang dikenal sebagai Leaf Spot (bintik daun) dapat disebabkan oleh berbagai jenis patogen, termasuk jamur, bakteri, atau bahkan virus. Penyakit ini dapat menyebabkan kerusakan pada daun brokoli dan pada tingkat yang lebih parah dapat mengurangi hasil panen. Gejala Leaf Spot pada brokoli umumnya berupa bintik-bintik berwarna coklat, hitam, atau keabu-abuan yang muncul pada daun tanaman. Bintik-bintik ini dapat bervariasi ukuran dan bentuknya. Pada kasus yang parah, bintik-bintik tersebut dapat bergabung dan menyebabkan nekrosis (kematian jaringan) pada daun. Selain itu, daun-daun yang terinfeksi Leaf Spot juga dapat menguning, mengering, dan akhirnya gugur. 
                
                Untuk mengendalikan penyakit Leaf Spot pada brokoli, beberapa langkah pencegahan dan pengendalian yang dapat dilakukan antara lain:

                    Memilih varietas brokoli yang tahan terhadap Leaf Spot jika tersedia.
                    Memastikan kebersihan di kebun dengan membersihkan sisa-sisa tanaman yang terinfeksi.
                    Memberikan ruang yang cukup antara tanaman untuk meningkatkan sirkulasi udara dan mengurangi kelembaban.
                    Menghindari penyiraman di malam hari untuk mengurangi kelembaban pada daun.
                    Menghindari cedera pada daun saat penanganan atau pemeliharaan tanaman.
                    Menggunakan metode sanitasi yang baik, seperti membersihkan peralatan pertanian yang terkontaminasi.
                    Menggunakan fungisida, bakterisida, atau pengendali penyakit lainnya yang direkomendasikan oleh ahli pertanian jika diperlukan.'
            ],
            [
                "kode_penyakit" => "P005",
                "url_gambar" => 'https://www.greenlife.co.ke/wp-content/uploads/2022/04/white_rust.jpg',
                "judul" => 'White Rust',
                "isi" => 'Penyakit tumbuhan brokoli yang dikenal sebagai White Rust (karat putih) disebabkan oleh jamur bernama Albugo candida. Penyakit ini dapat menyebabkan kerusakan pada daun dan organ reproduksi tanaman brokoli. White Rust seringkali menjadi masalah serius pada tanaman brokoli di daerah yang lembap dengan suhu yang sejuk. Gejala utama White Rust pada brokoli adalah adanya bercak-bercak putih atau kekuningan pada daun dan organ reproduksi, seperti bunga dan kuncup bunga. Bercak-bercak ini dapat tumbuh dan menyebabkan permukaan daun menjadi berlapisan putih, seperti serbuk atau kapur. Infeksi yang berat dapat menyebabkan daun menjadi keriting, kering, dan akhirnya gugur. Pada organ reproduksi, White Rust dapat menghambat pertumbuhan bunga dan mengurangi hasil panen. 
                
                Untuk mengendalikan penyakit White Rust pada brokoli, beberapa langkah pencegahan dan pengendalian yang dapat dilakukan antara lain:

                    Menanam varietas brokoli yang tahan terhadap White Rust jika tersedia.
                    Memberikan ruang yang cukup antara tanaman untuk meningkatkan sirkulasi udara dan mengurangi kelembaban.
                    Menghindari penyiraman di malam hari untuk mengurangi kelembaban pada daun.
                    Menghindari kelembaban yang berlebihan dengan memastikan adanya drainase yang baik.
                    Menghilangkan dan memusnahkan daun yang terinfeksi segera setelah gejalanya terlihat.
                    Menerapkan rotasi tanaman dan menghindari penanaman berdekatan dengan tanaman keluarga kubis-kubisan lainnya.
                    Menggunakan fungisida yang direkomendasikan oleh ahli pertanian jika diperlukan.'
            ],
        ];
        return $artikel;
    }
}
