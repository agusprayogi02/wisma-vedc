<?php

namespace App\Http\Resources\Kelas;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KelasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_xkelas' => $this->id_xkelas,
            'id_xdiklat_kategori' => $this->id_xdiklat_kategori,
            'nama_xdiklat_kategori' => $this->nama_xdiklat_kategori,
            'id_xdiklat_model' => $this->id_xdiklat_model,
            'kls_jenis' => $this->kls_jenis,
            'dm_nama' => $this->dm_nama,
            'nick_name' => $this->nick_name,
            'kls_tgl_mulai' => $this->kls_tgl_mulai,
            'kls_tgl_selesai' => $this->kls_tgl_selesai,
            'nama_pb' => $this->nama_pb,
            'nama_xkota' => $this->nama_xkota,
            'nama_xprop' => $this->nama_xprop,
            'kapasitas' => $this->kapasitas,
            'thn' => $this->thn,
            'id_xdiklat_jenjang' => $this->id_xdiklat_jenjang,
            'jd_nama' => $this->jd_nama,
            'ev_nama' => $this->ev_nama,
            'jml_jam' => $this->jml_jam,
            'peserta' => $this->peserta,
        ];
    }
}
