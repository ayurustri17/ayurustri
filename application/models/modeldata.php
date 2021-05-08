<?php
class Modeldata extends CI_Model
{
    public function ambil_data_user()
    {
        $this->db->where('id_user');
        return $this->db->get('tbl_user')->result();
    }
     public function get_beranda()
    {
        return $this->db->get('tbl_buku')->result();
    }
     public function get_buku()
    {
        return $this->db->get('tbl_buku')->result();
    }
     public function get_anggota()
    {
        return $this->db->get('tbl_anggota')->result();
    }
     public function get_peminjam()
    {
        return $this->db->get('tbl_peminjaman')->result();
    }

    public function daftar()
    {
        $isidatauser = array(
        'nama_user' => $this->input->post('nama',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'alamat_user' => $this->input->post('alamat',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'level' => 'pengguna'
        );
        return $this->db->insert('tbl_user',$isidatauser);
    }
    public function Simpan_anggota()
    {
        $isidata=array(
            'nama_anggota'      =>$this->input->post('nama_anggota',TRUE),
            'kelas'             =>$this->input->post('kelas',TRUE),
            'jenis_kelamin'     =>$this->input->post('jenis_kelamin',TRUE),
            'no_hp'             =>$this->input->post('no_hp',TRUE),
            'alamat'            =>$this->input->post('alamat',TRUE),
        );
        return $this->db->insert('tbl_anggota',$isidata);
    }
    public function Get_id_anggota($id)
    {
        $this->db->where('id_anggota',$id);
        return $this->db->get('tbl_anggota');
    }
    public function hapus_anggota()
    {
        $id_anggota=$this->input->post('id_anggota',TRUE);
        $this->db->where('id_anggota',$id_anggota);
        $this->db->delete('tbl_anggota');
    }
    public function get_id_anggota_edit($id)
    {
        $this->db->where('id_anggota',$id);
        return $this->db->get('tbl_anggota')->result();
    }
    public function update_anggota($id_anggota,$nama_anggota,$kelas,$jenis_kelamin,$no_hp,$alamat)
    {
        $isidata=array(
            'nama_anggota'      =>$nama_anggota,
            'kelas'             =>$kelas,
            'jenis_kelamin'     =>$jenis_kelamin,
            'no_hp'             =>$no_hp,
            'alamat'            =>$alamat,
        );
        $this->db->set($isidata);
        $this->db->where('id_anggota',$id_anggota);
        $this->db->update('tbl_anggota');
    }
    public function Simpan_peminjaman()
    {
        $isidata=array(
            'nama_peminjam'         =>$this->input->post('nama_peminjam',TRUE),
            'kelas'                 =>$this->input->post('kelas',TRUE),
            'nama_buku'             =>$this->input->post('nama_buku',TRUE),
            'tanggal_pinjam'        =>$this->input->post('tanggal_pinjam',TRUE),
            'tanggal_kembali'       =>$this->input->post('tanggal_kembali',TRUE),
            'tanggal_pengembalian'  =>$this->input->post('tanggal_pengembalian',TRUE),
            'telat'                 =>$this->input->post('telat',TRUE),
            'denda'                 =>$this->input->post('denda',TRUE),
            'jumlah_pinjam'         =>$this->input->post('jumlah_pinjam',TRUE),
            'petugas'               =>$this->input->post('petugas',TRUE),
        );
        return $this->db->insert('tbl_peminjaman',$isidata);
    }
    public function get_id_peminjaman($id)
    {
        $this->db->where('id_peminjam',$id);
        return $this->db->get('tbl_peminjaman');
    }
    public function hapus_peminjaman()
    {
        $id_peminjam=$this->input->post('id_peminjam',TRUE);
        $this->db->where('id_peminjam',$id_peminjam);
        $this->db->delete('tbl_peminjaman');
    }
    public function get_id_peminjam_edit($id)
    {
        $this->db->where('id_peminjam',$id);
        return $this->db->get('tbl_peminjaman')->result();
    }
    public function update_peminjam($id_peminjam,$nama_peminjam,$kelas,$nama_buku,$tanggal_pinjam,$tanggal_kembali,$tanggal_pengembalian,$telat,$denda,$jumlah_pinjam,$petugas)
    {
        $isidata=array(
            'nama_peminjam'      =>$nama_peminjam,
            'kelas'              =>$kelas,
            'nama_buku'          =>$nama_buku,
            'tanggal_pinjam'     =>$tanggal_pinjam,
            'tanggal_kembali'    =>$tanggal_kembali,
            'tanggal_pengembalian'=>$tanggal_pengembalian,
            'telat'              =>$telat,
            'denda'              =>$denda,
            'jumlah_pinjam'      =>$jumlah_pinjam,
            'petugas'            =>$petugas,
            
        );
        $this->db->set($isidata);
        $this->db->where('id_peminjam',$id_peminjam);
        $this->db->update('tbl_peminjaman');
    }
    public function Simpan_buku()
    {
        $isidata=array(
            'nama_buku'         =>$this->input->post('nama_buku',TRUE),
            'jenis_buku'        =>$this->input->post('jenis_buku',TRUE),
            'penulis_buku'      =>$this->input->post('penulis_buku',TRUE),
            'penerbit_buku'     =>$this->input->post('penerbit_buku',TRUE),
        );
        return $this->db->insert('tbl_buku',$isidata);
    }
    public function Get_id_buku($id)
    {
        $this->db->where('id_buku',$id);
        return $this->db->get('tbl_buku');
    }
    public function hapus_buku()
    {
        $id_buku=$this->input->post('id_buku',TRUE);
        $this->db->where('id_buku',$id_buku);
        $this->db->delete('tbl_buku');
    }
    public function get_id_buku_edit($id)
    {
        $this->db->where('id_buku',$id);
        return $this->db->get('tbl_buku')->result();
    }
    public function update_buku($id_buku,$nama_buku,$jenis_buku,$penulis_buku,$penerbit_buku)
    {
        $isidata=array(
            'nama_buku'         =>$nama_buku,
            'jenis_buku'        =>$jenis_buku,
            'penulis_buku'      =>$penulis_buku,
            'penerbit_buku'     =>$penerbit_buku,
        );
        $this->db->set($isidata);
        $this->db->where('id_buku',$id_buku);
        $this->db->update('tbl_buku');
    }
}