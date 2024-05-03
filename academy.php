<?php
include'koneksi.php'
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Projek JWD</title>
      <link rel="stylesheet" href="./src/css/style.css">
      <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
      <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   </head>
<body>
   
</body>
</html>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-transparent w-100">
         <div class="container">
            <span class="navbar-brand">
               <img src="./assets/logo/logo.png" alt="" width="52px" height="50px">
            </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav mx-auto">
                  <li class="nav-item mx-2">
                     <a class="nav-link" href="./index.php">Home</a>
                  </li>
                  <li class="nav-item mx-2">
                     <a class="nav-link" href="./academy.php">Academy</a>
                  </li>
                  <li class="nav-item mx-2">
                     <a class="nav-link" href="./index.php">Event</a>
                  </li>
                  <li class="nav-item mx-2">
                     <a class="nav-link" href="./index.php">About Us</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
<div class="card">
            <div class="card-header text-white bg-secondary">
            Data Peserta yang sudah terdaftar 😃
            </div>
            <div class="card-body">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Universitas</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis Pelatihan</th>
                        <th scope="col">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $sql2   = "SELECT * FROM vsga ORDER BY id DESC";
                     $q2     = mysqli_query($koneksi, $sql2);
                     $urut   = 1;
                     while ($r2 = mysqli_fetch_array($q2)) {
                        $id               = $r2['id'];
                        $nama             = $r2['nama'];
                        $univ             = $r2['univ'];
                        $alamat           = $r2['alamat'];
                        $jenispelatihan   = $r2['jenis'];

                     ?>
                     <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                        <td scope="row"><?php echo $nama ?></td>
                        <td scope="row"><?php echo $univ ?></td>
                        <td scope="row"><?php echo $alamat ?></td>
                        <td scope="row"><?php echo $jenispelatihan ?></td>
                        <td scope="row">
                           <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                           <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                        </td>
                     </tr>
                     <?php
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>