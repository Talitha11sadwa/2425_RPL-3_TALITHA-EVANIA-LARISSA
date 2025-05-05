<?php 
	// mengaktifkan session pada php
	session_start();
	
	// menghubungkan php dengan koneksi database
	include 'db_conn.php';
	
	// menangkap data yang dikirim dari form login
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	
	// menyeleksi data user dengan email dan password yang sesuai
	$login = mysqli_query($conn,"select * from min where email='$email' and password='$password'");
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($login);
	
	// cek apakah username dan password di temukan pada database
	if($cek > 0){
	
		$data = mysqli_fetch_assoc($login);
		$id = $data['id']; // Mengambil ID dari data user
        header("location:admin/home.php");
		// cek jika user login sebagai admin
		
	}else{
		header("location:index.php?pesan=gagal");
	}
	
	?>