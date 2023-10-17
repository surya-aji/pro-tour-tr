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
         Pegawai::create([
            'nama' => "H.HUSNUL MUHYIDIN, S.Ag.",
            'nip' => "19710514.199703.1.001",
            'tempat_lahir' => "Lombok Timur, Kabupaten (Selong)",
            'tanggal_lahir' => "1971-06-14",
            'jabatan' => "Ketua Pengadilan Agama Banyuwangi",
            'pangkat_golongan' => "IV/c",
        ]);

        Pegawai::create([
            'nama' => "H. SHOHEH, S.H.",
            'nip' => "19721214.199403.1.001",
            'tempat_lahir' => "Banyuwangi",
            'tanggal_lahir' => "1972-12-14",
            'jabatan' => "Sekretaris Pengadilan Agama Banyuwangi",
            'pangkat_golongan' => "Pembina Tingkat I (IV/b)",
        ]);

        Pegawai::create([
            'nama' => "Sugiarto, S.H.",
            'nip' => "19720613.200604.1.019",
            'tempat_lahir' => "Bondowoso",
            'tanggal_lahir' => "1972-06-13",
            'jabatan' => "Kasubag Umum dan Keuangan Pengadilan Agama Banyuwangi",
            'pangkat_golongan' => "III/d - PENATA TINGKAT I",
        ]);

        Pegawai::create([
            'nama' => "TATANG WINARTO, S.Kom.",
            'nip' => "197506222009121002",
            'tempat_lahir' => "Jember",
            'tanggal_lahir' => "1975-06-22",
            'jabatan' => "Kasubag Perencanaan, Teknologi Informasi dan Pelaporan Pengadilan Agama Banyuwangi",
            'pangkat_golongan' => "Penata (III/c)",
        ]);
    }
}
