<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Pegawai\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p1 =  Pegawai::create([
            'nama' => "H.HUSNUL MUHYIDIN, S.Ag.",
            'nip' => "197105141997031001",
            'tempat_lahir' => "Lombok Timur, Kabupaten (Selong)",
            'tanggal_lahir' => "1971-06-14",
            'jabatan' => "Ketua Pengadilan Agama Banyuwangi",
            'pangkat' => "IV/c",
            'nomor_telepon' => '081227365467',
            'alamat' => 'Seeder Alamat',
            'golongan' => "IV/c",
        ]);

        $p2 = Pegawai::create([
            'nama' => "H. SHOHEH, S.H.",
            'nip' => "197212141994031001",
            'tempat_lahir' => "Banyuwangi",
            'tanggal_lahir' => "1972-12-14",
            'jabatan' => "Sekretaris Pengadilan Agama Banyuwangi",
            'pangkat' => "Pembina Tingkat I",
            'nomor_telepon' => '081227365467',
            'alamat' => 'Seeder Alamat',
            'golongan' => "(IV/b)",
        ]);

        $p3 = Pegawai::create([
            'nama' => "Sugiarto, S.H.",
            'nip' => "19720613.200604.1.019",
            'tempat_lahir' => "Bondowoso",
            'tanggal_lahir' => "1972-06-13",
            'jabatan' => "Kasubag Umum dan Keuangan Pengadilan Agama Banyuwangi",
            'pangkat' => "PENATA TINGKAT I",
            'nomor_telepon' => '081227365467',
            'alamat' => 'Seeder Alamat',
            'golongan' => "III/d",
        ]);

        $p4 = Pegawai::create([
            'nama' => "TATANG WINARTO, S.Kom.",
            'nip' => "197506222009121002",
            'tempat_lahir' => "Jember",
            'tanggal_lahir' => "1975-06-22",
            'jabatan' => "Kasubag Perencanaan, Teknologi Informasi dan Pelaporan Pengadilan Agama Banyuwangi",
            'pangkat' => "Penata",
            'nomor_telepon' => '081227365467',
            'alamat' => 'Seeder Alamat',
            'golongan' => "(III/c)",
        ]);
    }
}
