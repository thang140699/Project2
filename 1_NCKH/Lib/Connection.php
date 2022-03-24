<?php 

class DB {
	public function connect() {
		$conn = mysqli_connect('localhost', 'root', '', 'csdl');
		mysqli_set_charset($conn, 'utf8');

		if(mysqli_connect_error()) {
			echo 'Connect error: ' . mysqli_connect_error();
		}
		return $conn;
	}
}

 ?>