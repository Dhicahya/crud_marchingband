<?php 
class database{

	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "crudphp";
	var $koneksi = "";
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

	function tampil_barang()
	{
		$data = mysqli_query($this->koneksi,"SELECT*FROM tb_barang
		INNER JOIN tb_kategori
		ON tb_kategori.id_kategori = tb_barang.id_kategori");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

	function tambah_barang($id_kategori,$nama_barang,$stok,$harga_beli)
	{
		mysqli_query($this->koneksi,"insert into tb_barang values ('','$id_kategori','$nama_barang','$stok','$harga_beli')");
	}

	function get_barang($id_barang)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_barang where id_barang='$id_barang'");
		return $query->fetch_array();
	}

	function update_barang($id_barang,$id_kategori,$nama_barang,$stok,$harga_beli)
	{
		$query = mysqli_query($this->koneksi,"update tb_barang set id_kategori='$id_kategori', nama_barang='$nama_barang',stok='$stok',harga_beli='$harga_beli' where id_barang='$id_barang'");
	}

	function delete_barang($id_barang)
	{
		$query = mysqli_query($this->koneksi,"delete from tb_barang where id_barang='$id_barang'");
	}

	//kategori
	function tampil_kategori()
	{
		$data = mysqli_query($this->koneksi,"SELECT*FROM tb_kategori");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

	function tambah_kategori($nama_kategori)
	{
		mysqli_query($this->koneksi,"insert into tb_kategori values ('','$nama_kategori')");
	}
	function get_kategori($id_kategori)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_kategori where id_kategori='$id_kategori'");
		return $query->fetch_array();
	}

	function update_kategori($id_kategori,$nama_kategori)
	{
		$query = mysqli_query($this->koneksi,"update tb_kategori set nama_kategori='$nama_kategori'  where id_kategori='$id_kategori'");
	}

	function delete_kategori($id_kategori)
	{
		$query = mysqli_query($this->koneksi,"delete from tb_kategori where id_kategori='$id_kategori'");
		return $query;
	}


}
?>