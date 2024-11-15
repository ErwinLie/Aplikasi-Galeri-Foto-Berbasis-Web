<?php

namespace App\Models;
use CodeIgniter\Model;

Class M_galeri extends Model
{ 
    public function tampil($tabel){
        return $this->db->table($tabel)
                        ->get()
                        ->getResult();
    }

    public function tampilwhere($tabel, $where){
        return $this->db->table($tabel)
                        ->where($where)
                        ->get()
                        ->getResult();
    }

    public function tampil2($tabel){
        return $this->db->table($tabel)
                        ->orderBy('id_kelas', 'DESC')
                        ->get()
                        ->getResult();
    }
  
	public function edit($tabel, $isi, $where){
        return $this->db->table($tabel)
                        ->update($isi,$where);
    }

    public function hapus($table,$where)
    {
        return $this->db->table($table)
                        ->delete($where);

    }
    
    public function getWhere($table, $where)
    {
        return $this->db->table($table)
                        ->where($where)
                        ->get()
                        ->getRow();
    }

    public function getWhere2($table, $where)
{
    return $this->db->table($table)
                    ->where($where)
                    ->get()
                    ->getResult(); // Mengembalikan array objek
    // atau
    // ->getResultArray(); // Mengembalikan array asosiatif
}

public function getWhere3($table, $where, $where2, $where3)
{
    return $this->db->table($table)
                    ->where($where)
                    ->where($where2)
                    ->where($where3)
                    ->get()
                    ->getRow(); // Mengembalikan array objek
    // atau
    // ->getResultArray(); // Mengembalikan array asosiatif
}

public function getCommentsByPhotoId($id_foto)
    {
        return $this->db->table($this->table)
            ->select('tb_komentar_foto.*, tb_user.username')
            ->join('tb_user', 'tb_user.id_user = tb_komentar_foto.id_user')
            ->where('tb_komentar_foto.id_foto', $id_foto)
            ->orderBy('tb_komentar_foto.tanggal_komentar', 'DESC')
            ->get()
            ->getResult();
    }
    
public function getWhere2Row($table, $where, $where2)
{
    return $this->db->table($table)
                    ->where($where)
                    ->where($where2)
                    ->get()
                    ->getRow(); // Mengembalikan array objek
    // atau
    // ->getResultArray(); // Mengembalikan array asosiatif
}
    public function getById($id)
    {
        return $this->db->table('tb_user')
            ->where('id_user', $id)
            ->get()
            ->getRow();
    }

    public function resetpassword($table,$kolom,$id,$data)
{
    
    $this->db->table($table)->where($kolom, $id)->update($data);
}

    public function getPassword($userId)
    {
        return $this->db->table('tb_user')
            ->select('password')
            ->where('id_user', $userId)
            ->get()
            ->getRow()
            ->password;
    }
    
    public function join($tabel, $tabel2, $on){
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->get()
                        ->getResult();
    }
    public function joinWhere($tabel, $tabel2, $on, $where){
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->getWhere($where)
                        ->getRow();
    
    }

    public function joinwhereleft($tabel, $tabel2, $on, $where){
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->where($where)
                        ->get()
                        ->getResult();
    }

    public function joinWheregetResult($tabel, $tabel2, $on, $where){
        return $this->db->table($tabel)
                        ->join($tabel2, $on)
                        ->getWhere($where)
                        ->getResult();
    
    }

    public function joinWheregetResult2($tabel, $tabel2, $on, $where, $where1)
{
    return $this->db->table($tabel)
                    ->join($tabel2, $on)
                    ->where($where)  // Apply the first condition
                    ->where($where1) // Apply the second condition
                    ->get()          // Execute the query
                    ->getResult();   // Get the result as an array of objects
}

// public function joinFiveWheregetResult2($tabel, $tabel2, $tabel3, $tabel4, $tabel5, $on, $on2, $on3, $on4, $where, $where1)
// {
//     return $this->db->table($tabel)
//                     ->join($tabel2, $on)
//                     ->join($tabel3, $on2)
//                     ->join($tabel4, $on3)
//                     ->join($tabel5, $on4 )
//                     ->where($where)  // Apply the first condition
//                     ->where($where1) // Apply the second condition
//                     ->get()          // Execute the query
//                     ->getResult();   // Get the result as an array of objects
// }

    public function joinThreeWhere($tabel, $tabel2, $tabel3, $on, $on2, $where){
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->join($tabel3, $on2, 'left')
                        ->getWhere($where)
                        ->getRow();
    
    }

    public function joinThreeWheregetResult($tabel, $tabel2, $tabel3, $on, $on2, $where){
        return $this->db->table($tabel)
                        ->join($tabel2, $on)
                        ->join($tabel3, $on2)
                        ->getWhere($where)
                        ->getResult();
    
    }

    public function joinThreeTables($tabel, $tabel2, $tabel3, $on1, $on2){
        return $this->db->table($tabel)
        ->join($tabel2, $on1, 'left')
        ->join($tabel3, $on2, 'left')
        ->get()
        ->getResult();
    }

    public function joinFourWheregetResult($tabel, $tabel2, $tabel3, $tabel4, $on, $on2, $on3, $where){
        return $this->db->table($tabel)
                        ->join($tabel2, $on)
                        ->join($tabel3, $on2)
                        ->join($tabel4, $on3)
                        ->getWhere($where)
                        ->getResult();
    
    }

    public function joinFourTables($tabel, $tabel2, $tabel3, $tabel4, $on1, $on2, $on3){
        return $this->db->table($tabel)
        ->join($tabel2, $on1, 'left')
        ->join($tabel3, $on2, 'left')
        ->join($tabel4, $on3, 'left')
        ->get()
        ->getResult();
     }

     public function joinFourWhere($tabel, $tabel2, $tabel3, $tabel4, $on, $on2, $on3, $where){
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->join($tabel3, $on2, 'left')
                        ->join($tabel4, $on3, 'left')
                        ->getWhere($where)
                        ->getRow();
    
    }
     
    public function joinFiveTables($tabel, $tabel2, $tabel3, $tabel4,$tabel5, $on1, $on2, $on3, $on4){
         return $this->db->table($tabel)
         ->join($tabel2, $on1, 'left')
         ->join($tabel3, $on2, 'left')
         ->join($tabel4, $on3, 'left')
         ->join($tabel5, $on4, 'left')
         ->get()
         ->getResult();
      }

      public function joinSixTables($tabel, $tabel2, $tabel3, $tabel4, $tabel5, $tabel6, $on1, $on2, $on3, $on4, $on5) {
        return $this->db->table($tabel)
            ->join($tabel2, $on1, 'left')
            ->join($tabel3, $on2, 'left')
            ->join($tabel4, $on3, 'left')
            ->join($tabel5, $on4, 'left')
            ->join($tabel6, $on5, 'left')
            ->get()
            ->getResult();
    }

      public function joinFiveWhere($tabel, $tabel2, $tabel3, $tabel4, $tabel5, $on, $on2, $on3, $on4, $where){
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->join($tabel3, $on2, 'left')
                        ->join($tabel4, $on3, 'left')
                        ->join($tabel5, $on4, 'left')
                        ->getWhere($where)
                        ->getRow();
    
    }

    public function joinFiveWheregetResult($tabel, $tabel2, $tabel3, $tabel4, $tabel5, $on, $on2, $on3, $on4, $where){
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->join($tabel3, $on2, 'left')
                        ->join($tabel4, $on3, 'left')
                        ->join($tabel5, $on4, 'left')
                        ->getWhere($where)
                        ->getResult();
    
    }

    public function joinSixWheregetResult($tabel, $tabel2, $tabel3, $tabel4, $tabel5, $tabel6, $on, $on2, $on3, $on4, $on5, $where1, $where2, $where3, $where4)
{
    $builder = $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->join($tabel3, $on2, 'left')
                        ->join($tabel4, $on3, 'left')
                        ->join($tabel5, $on4, 'left')
                        ->join($tabel6, $on5, 'left');

    // Apply where conditions
    if (!empty($where1)) {
        $builder->where($where1);
    }
    if (!empty($where2)) {
        $builder->where($where2);
    }
    if (!empty($where3)) {
        $builder->where($where3);
    }
    if (!empty($where4)) {
        $builder->where($where4);
    }

    return $builder->get()->getResult();
}
    
    public function tambah($tabel, $isi){
        return $this->db->table($tabel)
                        ->insert($isi);
    }

    public function upload($photo)
    {
        $imageName = $photo->getName();
        $photo->move(ROOTPATH . 'public/img', $imageName);
    }

    public function cari($tabel,$tabel2,$on,$awal,$akhir, $field){
        return $this->db->table($tabel)
                        ->join($tabel2,$on,'left')
                        ->getwhere($field." between '$awal' and '$akhir'")
                        ->getResult();
    }

public function saveToBackup($table, $data)
{
    $this->db->table($table)->insert($data);
}

public function get_jadwal($rombel, $blok, $tahun_ajaran)
{
    return $this->db->table('tb_jadwal')
        ->select('tb_jadwal.sesi, tb_guru.nama_guru, tb_mapel.nama_mapel, tb_guru.id_guru, tb_mapel.id_mapel, tb_jadwal.id_jadwal')
        ->join('tb_guru', 'tb_jadwal.id_guru = tb_guru.id_guru', 'left')
        ->join('tb_mapel', 'tb_jadwal.id_mapel = tb_mapel.id_mapel', 'left')
        ->where('tb_jadwal.id_rombel', $rombel)
        ->where('tb_jadwal.id_blok', $blok)
        ->where('tb_jadwal.id_tahun_ajaran', $tahun_ajaran)
        ->get()
        ->getResult();
}

// public function deleteJadwal($rombel, $blok, $tahun_ajaran)
//     {
//         return $this->db->table($this->table)
//             ->where('id_rombel', $rombel)
//             ->where('id_blok', $blok)
//             ->where('id_tahun_ajaran', $tahun_ajaran)
//             ->delete();
//     }

// public function deleteJadwal($rombel, $blok, $tahun_ajaran)
// {
//     return $this->db->table($this->table)
//         ->where('id_rombel', $rombel)
//         ->where('id_blok', $blok)
//         ->where('id_tahun_ajaran', $tahun_ajaran)
//         ->delete();
// }

public function hapus_jadwal($id_rombel, $id_blok, $id_tahun_ajaran)
{
    // Menghapus berdasarkan id_rombel, id_blok, dan id_tahun_ajaran
    return $this->db->table('tb_jadwal') // ganti dengan nama tabel yang sesuai
        ->where('id_rombel', $id_rombel)
        ->where('id_blok', $id_blok)
        ->where('id_tahun_ajaran', $id_tahun_ajaran)
        ->delete();
}

public function update_jadwal($sesi, $id_guru, $id_mapel)
    {
        return $this->db->table('tb_jadwal')
            ->where('sesi', $sesi)
            ->update(['id_guru' => $id_guru, 'id_mapel' => $id_mapel]);
    }

    public function getPenilaianWithJoins($where)
{
    $builder = $this->db->table('tb_penilaian') // Changed to tb_penilaian
        ->select('tb_penilaian.*, tb_siswa.nama_siswa, tb_siswa.id_rombel, tb_blok.nama_blok, tb_mapel.nama_mapel, tb_semester.nama_semester, tb_tahun_ajaran.tahun_ajaran') // Changed table prefixes to tb_
        ->join('tb_siswa', 'tb_penilaian.id_siswa = tb_siswa.id_siswa') // Changed to tb_siswa
        ->join('tb_blok', 'tb_penilaian.id_blok = tb_blok.id_blok') // Changed to tb_blok
        ->join('tb_mapel', 'tb_penilaian.id_mapel = tb_mapel.id_mapel') // Changed to tb_mapel
        ->join('tb_semester', 'tb_penilaian.id_semester = tb_semester.id_semester') // Changed to tb_semester
        ->join('tb_tahun_ajaran', 'tb_penilaian.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran') // Changed to tb_tahun_ajaran
        ->where($where); // Apply the where condition here

    // Execute the query and return the result
    $query = $builder->get();
    
    // Check if the query executed successfully
    if ($query) {
        return $query->getResult(); // Return the result
    } else {
        return []; // Return an empty array if query fails
    }
}


public function tampil_siswa()
    {
        return $this->db->table('tb_siswa')
            ->join('tb_rombel', 'tb_siswa.id_rombel = tb_rombel.id_rombel')
            ->select('tb_siswa.id_siswa, tb_siswa.nama_siswa, tb_rombel.nama_rombel')
            ->get()
            ->getResult();
    }

    public function getPenilaianData($id_siswa, $id_tahun_ajaran, $id_semester, $id_blok)
{
    return $this->db->table('tb_penilaian')
        ->select('tb_penilaian.*, tb_siswa.nama_siswa, tb_siswa.nis, tb_rombel.nama_rombel, tb_semester.nama_semester, tb_mapel.nama_mapel')
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_penilaian.id_siswa')
        ->join('tb_rombel', 'tb_rombel.id_rombel = tb_siswa.id_rombel')
        ->join('tb_semester', 'tb_semester.id_semester = tb_penilaian.id_semester')
        ->join('tb_mapel', 'tb_mapel.id_mapel = tb_penilaian.id_mapel') // Join to the tb_mapel table
        ->where('tb_penilaian.id_siswa', $id_siswa)
        ->where('tb_penilaian.id_tahun_ajaran', $id_tahun_ajaran)
        ->where('tb_penilaian.id_semester', $id_semester)
        ->where('tb_penilaian.id_blok', $id_blok)
        ->get()
        ->getResult();
}

}