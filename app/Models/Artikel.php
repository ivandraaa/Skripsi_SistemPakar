<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $fillable = ["judul", "kode_pasal", "isi", "referensi", "kategori_pelanggaran"];

    public function pasal()
    {
        return $this->belongsTo(TingkatPasal::class, 'kode_pasal', 'kode_pasal');
    }

    public function fillTabel()
    {
        $artikel = [
            [
                "kode_pasal" => "P001",
                "judul" => 'Pasal 310 Ayat 1',
                "isi" => 'Bunyi Pasal: Setiap orang yang mengemudikan Kendaraan Bermotor yang karena kelalaiannya mengakibatkan Kecelakaan Lalu Lintas dengan kerusakan Kendaraan dan/atau barang sebagaimana dimaksud dalam Pasal 229 ayat (2), dipidana dengan pidana penjara paling lama 6 (enam) bulan dan/atau denda paling banyak Rp1.000.000,00 (satu juta rupiah).',
                "referensi" => 'Identifikasi Pasal, Mengacu Terhadap Pasal 229 Ayat 2: Kecelakaan Lalu Lintas ringan sebagaimana dimaksud pada ayat (1) huruf a merupakan kecelakaan yang mengakibatkan kerusakan Kendaraan dan/atau barang.',
                "kategori_pelanggaran" => 'Dapat Dikategorikan Anda Melanggar Tindak Pidana Kecelakaan Lalu Lintas Ringan.'
            ],
            [
                "kode_pasal" => "P002",
                "judul" => 'Pasal 310 Ayat 2',
                "isi" => 'Bunyi Pasal: Setiap orang yang mengemudikan Kendaraan Bermotor yang karena kelalaiannya mengakibatkan Kecelakaan Lalu Lintas dengan korban luka ringan dan kerusakan Kendaraan dan/atau barang sebagaimana dimaksud dalam Pasal 229 ayat (3), dipidana dengan pidana penjara paling lama 1 (satu) tahun dan/atau denda paling banyak Rp2.000.000,00 (dua juta rupiah).',
                "referensi" => 'Identifikasi Pasal, Mengacu Terhadap Pasal 229 Ayat 3: Kecelakaan Lalu Lintas sedang sebagaimana dimaksud pada ayat (1) huruf b merupakan kecelakaan yang mengakibatkan luka ringan dan kerusakan Kendaraan hhdan/atau barang.',
                "kategori_pelanggaran" => 'Dapat Dikategorikan Anda Melanggar Tindak Pidana Kecelakaan Lalu Lintas Sedang.'
            ],
            [
                "kode_pasal" => "P003",
                "judul" => 'Pasal 310 Ayat 3',
                "isi" => 'Bunyi Pasal: Setiap orang yang mengemudikan Kendaraan Bermotor yang karena kelalaiannya mengakibatkan Kecelakaan Lalu Lintas dengan korban luka berat sebagaimana dimaksud dalam Pasal 229 ayat (4), dipidana dengan pidana penjara paling lama 5 (lima) tahun dan/atau denda paling banyak Rp10.000.000,00 (sepuluh juta rupiah)',
                "referensi" => 'Identifikasi Pasal, Mengacu Terhadap Pasal 229 Ayat 4: Kecelakaan Lalu Lintas berat sebagaimana dimaksud pada ayat (1) huruf c merupakan kecelakaan yang mengakibatkan korban meninggal dunia atau luka berat.',
                "kategori_pelanggaran" => 'Dapat Dikategorikan Anda Melanggar Tindak Pidana Kecelakaan Lalu Lintas Berat.'
            ], 
            [
                "kode_pasal" => "P004",
                "judul" => 'Pasal 311 Ayat 1',
                "isi" => 'Bunyi Pasal: Setiap orang yang dengan sengaja mengemudikan Kendaraan Bermotor dengan cara atau keadaan yang membahayakan bagi nyawa atau barang dipidana dengan pidana penjara paling lama 1 (satu) tahun atau denda paling banyak Rp3.000.000,00 (tiga juta rupiah).',
                "referensi" => 'Tidak Ada Identifikasi Pasal Mengacu Terhadap Pasal 311 Ayat 1 Pada UU No 22 Tahun 2009 Tentang Lalu Lintas dan Angkutan Jalan.',
                "kategori_pelanggaran" => 'Tidak Ada Kategori Pelanggaran Terhadap Pasal 311 Ayat 1 Pada UU No 22 Tahun 2009 Tentang Lalu Lintas dan Angkutan Jalan.'
            ], 
            [
                "kode_pasal" => "P005",
                "judul" => 'Pasal 311 Ayat 2',
                "isi" => 'Bunyi Pasal: Dalam hal perbuatan sebagaimana dimaksud pada ayat (1) mengakibatkan Kecelakaan Lalu Lintas dengan kerusakan Kendaraan dan/atau barang sebagaimana dimaksud dalam Pasal 229 ayat (2), pelaku dipidana dengan pidana penjara paling lama 2 (dua) tahun atau denda paling banyak Rp4.000.000,00 (empat juta rupiah).',
                "referensi" => 'Identifikasi Pasal, Mengacu Terhadap Pasal 229 Ayat 2: Kecelakaan Lalu Lintas ringan sebagaimana dimaksud pada ayat (1) huruf a merupakan kecelakaan yang mengakibatkan kerusakan Kendaraan dan/atau barang.',
                "kategori_pelanggaran" => 'Dapat Dikategorikan Anda Melanggar Tindak Pidana Kecelakaan Lalu Lintas Ringan.'
            ],
            [
                "kode_pasal" => "P006",
                "judul" => 'Pasal 311 Ayat 3',
                "isi" => 'Bunyi Pasal: Dalam hal perbuatan sebagaimana dimaksud pada ayat (1) mengakibatkan Kecelakaan Lalu Lintas dengan korban luka ringan dan kerusakan Kendaraan dan/atau barang sebagaimana dimaksud dalam Pasal 229 ayat (3), pelaku dipidana dengan pidana penjara paling lama 4 (empat) tahun atau denda paling banyak Rp8.000.000,00 (delapan juta rupiah).',
                "referensi" => 'Identifikasi Pasal, Mengacu Terhadap Pasal 229 Ayat 3: Kecelakaan Lalu Lintas sedang sebagaimana dimaksud pada ayat (1) huruf b merupakan kecelakaan yang mengakibatkan luka ringan dan kerusakan Kendaraan hhdan/atau barang.',
                "kategori_pelanggaran" => 'Dapat Dikategorikan Anda Melanggar Tindak Pidana Kecelakaan Lalu Lintas Sedang.'
            ],
            [
                "kode_pasal" => "P007",
                "judul" => 'Pasal 311 Ayat 4',
                "isi" => 'Bunyi Pasal: Dalam hal perbuatan sebagaimana dimaksud pada ayat (1) mengakibatkan Kecelakaan Lalu Lintas dengan korban luka berat sebagaimana dimaksud dalam Pasal 229 ayat (4), pelaku dipidana dengan pidana penjara paling lama 10 (sepuluh) tahun atau denda paling banyak Rp20.000.000,00 (dua puluh juta rupiah).',
                "referensi" => 'Identifikasi Pasal, Mengacu Terhadap Pasal 229 Ayat 4: Kecelakaan Lalu Lintas berat sebagaimana dimaksud pada ayat (1) huruf c merupakan kecelakaan yang mengakibatkan korban meninggal dunia atau luka berat.',
                "kategori_pelanggaran" => 'Dapat Dikategorikan Anda Melanggar Tindak Pidana Kecelakaan Lalu Lintas Berat.'
            ],
        ];
        return $artikel;
    }
}
