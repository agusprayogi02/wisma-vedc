<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PesertaService
{
    public function index(string $kelasId): array
    {
        $cmdCalon = "SELECT " .
            "a.id_xcalonpeserta AS id_xcalonpeserta, " .
            "a.id_xkelas_rencana, " .
            "a.nik AS nik, " .
            "a.nama AS nama, " .
            "a.tanggal_lahir AS tanggal_lahir, " .
            "a.tempat_lahir AS tempat_lahir, " .
            "a.nip AS nip, " .
            "a.jenis_kelamin AS jenis_kelamin, " .
            "a.npsn AS npsn, " .
            "b.nama as nama_sekolah, " .
            "b.nama_kabupaten_kota as kabkota, " .
            "b.nama_provinsi as prop, " .
            "a.jenis_ptk AS jenis_ptk " .
            "FROM calon_peserta as a " .
            "LEFT JOIN master.t_sekolah b ON a.npsn = b.npsn " .
            "WHERE a.id_xkelas_rencana = $kelasId AND a.id_xkelas = $kelasId";

        $cmdIna = "SELECT " .
            "a.id_xcalonpeserta AS id_xcalonpeserta, " .
            "a.id_xkelas, " .
            "a.nik AS nik, " .
            "a.nama AS nama, " .
            "a.tanggal_lahir AS tanggal_lahir, " .
            "a.tempat_lahir AS tempat_lahir, " .
            "a.nip AS nip, " .
            "a.jenis_kelamin AS jenis_kelamin, " .
            "a.npsn AS npsn, " .
            "b.nama as nama_sekolah, " .
            "b.nama_kabupaten_kota as kabkota, " .
            "b.nama_provinsi as prop, " .
            "a.jenis_ptk AS jenis_ptk " .
            "FROM peserta_ina as a " .
            "LEFT JOIN master.t_sekolah b ON a.npsn = b.npsn " .
            "WHERE a.id_xkelas = " . $kelasId;

        $arr = DB::connection('second_db')->select($cmdIna);
        foreach ($arr as $data) {
            $data->status = "Sudah teregistrasi";
        }
        $arrCalon = DB::connection('second_db')->select($cmdCalon);
        foreach ($arrCalon as $data) {
            $data->status = "Belum teregistrasi";
        }
        return array_merge($arr, $arrCalon);
    }
}
