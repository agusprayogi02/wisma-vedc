<?php

namespace App\Services;

use App\Http\Requests\Kelas\PaginateKelasRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class KelasService
{
    public function index(PaginateKelasRequest $request): LengthAwarePaginator
    {
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 10);
        $cmd = "SELECT " .
            "a.id_xkelas, " .
            "a.id_xdiklat_kategori, " .
            "g.nama_xdiklat_kategori, " .
            "a.id_xdiklat_model, " .
            "f.dm_nama, " .
            "a.nick_name, " .
            "b.kls_tgl_mulai, " .
            "b.kls_tgl_selesai, " .
            "c.nama_pb, " .
            "d.nama_xkota, " .
            "e.nama_xprop " .
            "FROM " .
            "xkelas AS a " .
            "INNER JOIN xkelas_detail AS b ON a.id_xkelas = b.id_xkelas " .
            "LEFT JOIN xpb AS c ON a.id_xpb = c.id_xpb " .
            "LEFT JOIN xkota AS d ON c.id_xkota = d.id_xkota " .
            "LEFT JOIN xprop AS e ON d.id_xprop = e.id_xprop " .
            "LEFT JOIN xdiklat_model AS f ON a.id_xdiklat_model = f.id_xdiklat_model " .
            "LEFT JOIN xdiklat_kategori AS g ON a.id_xdiklat_kategori = g.id_xdiklat_kategori " .
            "WHERE a.thn = " . $request->tahun . " ORDER BY a.id_xkelas DESC LIMIT " . $limit . " OFFSET " . ($page - 1) * $limit;
        $items = DB::connection('second_db')->select($cmd);
        $cmdCount = "SELECT COUNT(*) as total " .
            "FROM xkelas AS a " .
            "INNER JOIN xkelas_detail AS b ON a.id_xkelas = b.id_xkelas " .
            "LEFT JOIN xpb AS c ON a.id_xpb = c.id_xpb " .
            "LEFT JOIN xkota AS d ON c.id_xkota = d.id_xkota " .
            "LEFT JOIN xprop AS e ON d.id_xprop = e.id_xprop " .
            "LEFT JOIN xdiklat_model AS f ON a.id_xdiklat_model = f.id_xdiklat_model " .
            "LEFT JOIN xdiklat_kategori AS g ON a.id_xdiklat_kategori = g.id_xdiklat_kategori " .
            "WHERE a.thn = " . $request->tahun;
        $count = DB::connection('second_db')->select($cmdCount);
        return new LengthAwarePaginator(
            items: $items,
            total: $count[0]->total, perPage: $limit,
            currentPage: $page,
            options: ['path' => LengthAwarePaginator::resolveCurrentPath()],
        );
    }

    /**
     * @param string $id
     * @return array
     */
    public function show(string $id): array
    {
        $cmd = "SELECT" .
            "   a.id_xkelas," .
            "	a.id_xdiklat_kategori," .
            "	g.nama_xdiklat_kategori," .
            "	a.id_xdiklat_model," .
            "	a.kls_jenis," .
            "	f.dm_nama," .
            "	a.nick_name," .
            "	b.kls_tgl_mulai," .
            "	b.kls_tgl_selesai," .
            "	c.nama_pb," .
            "	d.nama_xkota," .
            "	e.nama_xprop," .
            "	a.kapasitas," .
            "	a.thn," .
            "	a.id_xdiklat_jenjang," .
            "	i.jd_nama," .
            "	h.ev_nama," .
            "	a.jml_jam " .
            "FROM" .
            "	xkelas AS a" .
            "	INNER JOIN xkelas_detail AS b ON a.id_xkelas = b.id_xkelas" .
            "	LEFT JOIN xpb AS c ON a.id_xpb = c.id_xpb" .
            "	LEFT JOIN xkota AS d ON c.id_xkota = d.id_xkota" .
            "	LEFT JOIN xprop AS e ON d.id_xprop = e.id_xprop" .
            "	LEFT JOIN xdiklat_model AS f ON a.id_xdiklat_model = f.id_xdiklat_model" .
            "	LEFT JOIN xdiklat_kategori AS g ON a.id_xdiklat_kategori = g.id_xdiklat_kategori" .
            "	LEFT JOIN xevent AS h ON a.id_xevent = h.id_xevent" .
            "	LEFT JOIN xdiklat_jenjang AS i ON a.id_xdiklat_jenjang = i.id_xdiklat_jenjang " .
            "WHERE a.id_xkelas = $id";

        return DB::connection('second_db')->select($cmd);
    }
}
