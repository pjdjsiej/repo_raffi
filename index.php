<!DOCTYPE html>
<html>
<head>
	<!-- load file CSS Bootsrap offline -->
	<link rel="stylesheet" href="bootstrap/css//bootstrap.min.css">
</head>
<body>
<div class="container">
	<br>
	<h4>APLIKASI CRUD</h4>
<?php

    include "koneksi.php";

    //cek apakah ada nilai dari method GET dengan nama id_anggota
    if (isset($_GET['id_anggota'])) {
    	$id_anggota=htmlspecialchars($_GET["id_anggota"]);

    	$sql="delete from anggota where id_anggota='$ id_anggota' ";
    	$hasil=mysqli_query($ko,$sql);

    	//kondisi apakah berhasil atau tidak
    	    if ($hasil) {
    	    	header("location:index.php");

    	    }
    	    else {
    	    	echo "<div class='alert alert-danger'> data bagal dihapus.</div>";

    	    }
    	}
?>

    <table class="table tabel-bordered table-hover">
    	<br>
    	<thead>
        <tr>
        	<th>No</th>
        	<th>Username</th>
        	<th>Nama</th>
        	<th>Alamat</th>
        	<th>Email</th>
        	<th>No HP</th>
        	<th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from anggota order by id_anggota desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
        	$no++;
        	
        ?>
        <tbody>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $data["username"]; ?></td>
            <td><?php echo $data["nama"]; ?></td>
            <td><?php echo $data["alamat"]; ?></td>
            <td><?php echo $data["email"]; ?></td>
            <td><?php echo $data["no_hp"]; ?></td>
            <td>
            	<a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-warning" role="button">update</a>
            	<a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>id_anggota=<?php echo $data['id_anggota']; ?>"class="btn btn-danger" role="button">Delate</a>
            </td>
        </tr>
        </tbody>
        <?php
    }
    ?>
</table>
<a href="create.php"class="btn btn-primary" role="button">Tambah data</a>

</div>
</body>
</html>