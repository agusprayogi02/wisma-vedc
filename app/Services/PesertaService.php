<?php

namespace App\Services;

use App\Http\Requests\Peserta\ListPesertaRequest;
use App\Http\Requests\Peserta\SearchPesertaRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PesertaService
{
    public function index(ListPesertaRequest $request): LengthAwarePaginator
    {
        $kelasId = $request->get('id_xkelas', '');
        $search = $request->get('search', '');
        $limit = $request->get('limit', 10);
        $page = $request->get('page', 1);

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
            "a.jenis_ptk AS jenis_ptk , " .
            "d.nick_name, " .
            "c.kls_tgl_mulai, " .
            "c.kls_tgl_selesai, " .
            "c.kls_periode " .
            "FROM calon_peserta as a " .
            "LEFT JOIN master.t_sekolah b ON a.npsn = b.npsn " .
            "LEFT JOIN xkelas_detail c ON a.id_xkelas = c.id_xkelas " .
            "LEFT JOIN xkelas d ON d.id_xkelas = a.id_xkelas ";

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
            "a.jenis_ptk AS jenis_ptk, " .
            "d.nick_name, " .
            "c.kls_tgl_mulai, " .
            "c.kls_tgl_selesai, " .
            "c.kls_periode " .
            "FROM peserta_ina as a " .
            "LEFT JOIN master.t_sekolah b ON a.npsn = b.npsn " .
            "LEFT JOIN xkelas_detail c ON c.id_xkelas = a.id_xkelas " .
            "LEFT JOIN xkelas d ON d.id_xkelas = a.id_xkelas ";

        return $this->resultSearch($cmdCalon, $cmdIna, $kelasId, $search, $limit, $page, true);
    }

    public function getOnlyIdAndName(?string $kelasId, ?string $search): LengthAwarePaginator
    {
        $cmdCalon = "SELECT " .
            "a.id_xcalonpeserta AS id_xcalonpeserta, " .
            "a.nama AS nama " .
            "FROM calon_peserta as a ";

        $cmdIna = "SELECT " .
            "a.id_xcalonpeserta AS id_xcalonpeserta, " .
            "a.nama AS nama " .
            "FROM peserta_ina as a ";

        return $this->resultSearch($cmdCalon, $cmdIna, $kelasId ?? "", $search ?? "", 20, 1, false);
    }

    protected function resultSearch(string $cmdCalon, string $cmdIna, string $kelasId, string $search, int $limit, int $page, bool $withStatus): LengthAwarePaginator
    {
        $cmdCountCalon = "SELECT COUNT(*) as total " .
            "FROM calon_peserta as a " .
            "LEFT JOIN master.t_sekolah b ON a.npsn = b.npsn " .
            "LEFT JOIN xkelas_detail c ON a.id_xkelas = c.id_xkelas " .
            "LEFT JOIN xkelas d ON d.id_xkelas = a.id_xkelas ";

        $cmdCountIna = "SELECT COUNT(*) as total " .
            "FROM peserta_ina as a " .
            "LEFT JOIN master.t_sekolah b ON a.npsn = b.npsn " .
            "LEFT JOIN xkelas_detail c ON c.id_xkelas = a.id_xkelas " .
            "LEFT JOIN xkelas d ON d.id_xkelas = a.id_xkelas ";

        if ($kelasId != "" || $search != "") {
            $cmdCalon .= "WHERE ";
            $cmdIna .= "WHERE ";
            $cmdCountIna .= "WHERE ";
            $cmdCountCalon .= "WHERE ";
        }
        if ($kelasId != "") {
            $calon = " a.id_xkelas_rencana = $kelasId AND a.id_xkelas = $kelasId ";
            $ina = " a.id_xkelas = $kelasId ";
            $cmdCalon .= $calon;
            $cmdCountCalon .= $calon;
            $cmdIna .= $ina;
            $cmdCountIna .= $ina;
        }
        if ($search != "") {
            if ($kelasId != "") {
                $cmdCalon .= "AND";
                $cmdIna .= "AND";
                $cmdCountIna .= "AND";
                $cmdCountCalon .= "AND";
            }
            $calon = " (a.nama LIKE '%$search%' " .
                "OR a.nik LIKE '%$search%' OR a.nip LIKE '%$search%')";
            $ina = " (a.nama LIKE '%$search%' " .
                "OR a.nik LIKE '%$search%' OR a.nip LIKE '%$search%')";
            $cmdCalon .= $calon;
            $cmdCountCalon .= $calon;
            $cmdIna .= $ina;
            $cmdCountIna .= $ina;
        }
        $cmdCalon .= " ORDER BY c.kls_tgl_mulai DESC LIMIT $limit OFFSET " . ($page - 1) * $limit;
        $cmdIna .= " ORDER BY c.kls_tgl_mulai DESC LIMIT $limit OFFSET " . ($page - 1) * $limit;

        $arr = DB::connection('second_db')->select($cmdIna);
        $counCalon = DB::connection('second_db')->select($cmdCountCalon);
        foreach ($arr as $data) {
            $data->status = "Sudah teregistrasi";
        }
        $arrCalon = DB::connection('second_db')->select($cmdCalon);
        $countIna = DB::connection('second_db')->select($cmdCountIna);
        foreach ($arrCalon as $data) {
            $data->status = "Belum teregistrasi";
        }
        return new LengthAwarePaginator(
            items: array_merge($arr, $arrCalon),
            total: $countIna[0]->total + $counCalon[0]->total,
            perPage: $limit,
            currentPage: $page,
            options: ['path' => LengthAwarePaginator::resolveCurrentPath()],
        );
    }

    function getByKelas($id): array
    {
//        $cmdCalon = "SELECT " .
//            "a.id_xcalonpeserta AS id_xcalonpeserta, " .
//            "a.id_xkelas_rencana, " .
//            "a.nik AS nik, " .
//            "a.nama AS nama, " .
//            "a.tanggal_lahir AS tanggal_lahir, " .
//            "a.tempat_lahir AS tempat_lahir, " .
//            "a.nip AS nip, " .
//            "a.jenis_kelamin AS jenis_kelamin, " .
//            "a.npsn AS npsn, " .
//            "b.nama as nama_sekolah, " .
//            "b.nama_kabupaten_kota as kabkota, " .
//            "b.nama_provinsi as prop, " .
//            "a.jenis_ptk AS jenis_ptk , " .
//            "d.nick_name, " .
//            "c.kls_tgl_mulai, " .
//            "c.kls_tgl_selesai, " .
//            "c.kls_periode " .
//            "FROM calon_peserta as a " .
//            "LEFT JOIN master.t_sekolah b ON a.npsn = b.npsn " .
//            "LEFT JOIN xkelas_detail c ON a.id_xkelas = c.id_xkelas " .
//            "LEFT JOIN xkelas d ON d.id_xkelas = a.id_xkelas " .
//            "WHERE a.id_xkelas_rencana = $id AND a.id_xkelas = $id ";
//
//        $cmdIna = "SELECT " .
//            "a.id_xcalonpeserta AS id_xcalonpeserta, " .
//            "a.id_xkelas, " .
//            "a.nik AS nik, " .
//            "a.nama AS nama, " .
//            "a.tanggal_lahir AS tanggal_lahir, " .
//            "a.tempat_lahir AS tempat_lahir, " .
//            "a.nip AS nip, " .
//            "a.jenis_kelamin AS jenis_kelamin, " .
//            "a.npsn AS npsn, " .
//            "b.nama as nama_sekolah, " .
//            "b.nama_kabupaten_kota as kabkota, " .
//            "b.nama_provinsi as prop, " .
//            "a.jenis_ptk AS jenis_ptk, " .
//            "d.nick_name, " .
//            "c.kls_tgl_mulai, " .
//            "c.kls_tgl_selesai, " .
//            "c.kls_periode " .
//            "FROM peserta_ina as a " .
//            "LEFT JOIN master.t_sekolah b ON a.npsn = b.npsn " .
//            "LEFT JOIN xkelas_detail c ON c.id_xkelas = a.id_xkelas " .
//            "LEFT JOIN xkelas d ON d.id_xkelas = a.id_xkelas " .
//            "WHERE a.id_xkelas = $id";
//
//        $arr = DB::connection('second_db')->select($cmdIna);
//        foreach ($arr as $data) {
//            $data->status = "Sudah teregistrasi";
//        }
//        $arrCalon = DB::connection('second_db')->select($cmdCalon);
//        foreach ($arrCalon as $data) {
//            $data->status = "Belum teregistrasi";
//        }
//        return array_merge($arr, $arrCalon);

        $selectFields = "a.id_xcalonpeserta AS id_xcalonpeserta, a.id_xkelas, a.nik AS nik, a.nama AS nama, " .
            "a.tanggal_lahir AS tanggal_lahir, a.tempat_lahir AS tempat_lahir, a.nip AS nip, " .
            "a.jenis_kelamin AS jenis_kelamin, a.npsn AS npsn, b.nama as nama_sekolah, " .
            "b.nama_kabupaten_kota as kabkota, b.nama_provinsi as prop, a.jenis_ptk AS jenis_ptk, " .
            "d.nick_name, c.kls_tgl_mulai, c.kls_tgl_selesai, c.kls_periode";

        $joinTables = "LEFT JOIN master.t_sekolah b ON a.npsn = b.npsn " .
            "LEFT JOIN xkelas_detail c ON c.id_xkelas = a.id_xkelas " .
            "LEFT JOIN xkelas d ON d.id_xkelas = a.id_xkelas";

        $cmdIna = "SELECT " . $selectFields . ", 'Sudah teregistrasi' as status FROM peserta_ina as a " . $joinTables . " WHERE a.id_xkelas = " . $id;
        $cmdCalon = "SELECT " . $selectFields . ", 'Belum teregistrasi' as status FROM calon_peserta as a " . $joinTables . " WHERE a.id_xkelas_rencana =" . $id . " AND a.id_xkelas = " . $id;

        $cmdUnion = "$cmdIna UNION $cmdCalon";

        return DB::connection('second_db')->select($cmdUnion);
    }

    public function search(SearchPesertaRequest $request): LengthAwarePaginator
    {
        $search = $request->get('search');
        $limit = $request->get('limit', 10);
        $page = $request->get('page', 1);
        $myKey = "";
        if ($search) {
            if (is_numeric($search)) {
                $myKey = "WHERE c.thn = '$search' OR a.nik LIKE '%$search%'";
                $myKey .= " OR a.nip         LIKE '%$search%'";
            } else {
                $myKey = "WHERE a.nama LIKE '%$search%'";
            }
        }
        $cmd = 'SELECT ' .
            '`a`.`id_xcalonpeserta` AS `id_xcalonpeserta`, ' .
            'a.id_xkelas as id_xkelas, ' .
            'c.nick_name as nama_kelas, ' .
            'kls_tgl_checkin, ' .
            'kls_tgl_checkout, ' .
            '`a`.`nik` AS `nik`, ' .
            '`a`.`nama` AS `nama`, ' .
            '`a`.`tanggal_lahir` AS `tanggal_lahir`, ' .
            '`a`.`nip` AS `nip`, ' .
            '`a`.`jenis_kelamin` AS `jenis_kelamin`, ' .
            'c.id_xpb, ' .
            '`a`.`npsn` AS `npsn`, a.room_id, a.room_name, ' .
            'a.sekolah as nama_sekolah, ' .
            'e.kota_ujob ' .
            'FROM peserta_ina as a ' .
            'LEFT JOIN xkelas c ON a.id_xkelas = c.id_xkelas ' .
            'LEFT JOIN ujob e ON a.id_xcalonpeserta = e.id_peserta ' .
            'LEFT JOIN xkelas_detail d ON a.id_xkelas = d.id_xkelas ' . $myKey .
            ' UNION ' .
            'SELECT `a`.`id_xcalonpeserta` AS `id_xcalonpeserta`, ' .
            'a.id_xkelas as id_xkelas, ' .
            'c.nick_name as nama_kelas, ' .
            'kls_tgl_checkin, ' .
            'kls_tgl_checkout, ' .
            '`a`.`nik` AS `nik`, ' .
            '`a`.`nama` AS `nama`, ' .
            '`a`.`tanggal_lahir` AS `tanggal_lahir`, ' .
            '`a`.`nip` AS `nip`, ' .
            '`a`.`jenis_kelamin` AS `jenis_kelamin`, ' .
            'c.id_xpb, ' .
            '`a`.`npsn` AS `npsn`, a.room_id, a.room_name, ' .
            'a.sekolah as nama_sekolah, ' .
            'e.kota_ujob ' .
            'FROM calon_peserta as a ' .
            //'FROM peserta_ina as a '.
            'LEFT JOIN xkelas c ON a.id_xkelas = c.id_xkelas ' .
            'LEFT JOIN ujob e ON a.id_xcalonpeserta = e.id_peserta ' .
            'LEFT JOIN xkelas_detail d ON a.id_xkelas = d.id_xkelas ' . $myKey;
        $cmdFinal = "SELECT * FROM ($cmd) as a LIMIT $limit OFFSET " . ($page - 1) * $limit;
        $query = DB::connection('second_db')->select($cmdFinal);
        $count = DB::connection('second_db')->select("SELECT COUNT(*) as total FROM ($cmd) as a");
        return new LengthAwarePaginator(
            items: $query,
            total: $count[0]->total ?? 0,
            perPage: $limit,
            currentPage: $page,
            options: ['path' => LengthAwarePaginator::resolveCurrentPath()],
        );
    }
}


