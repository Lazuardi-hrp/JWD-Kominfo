<?php
include'koneksi.php';
?>
<?php
$nama        = "";
$univ       = "";
$alamat     = "";
$jenispelatihan   = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
   $op = $_GET['op'];
} else {
   $op = "";
}
if($op == 'delete'){
   $id         = $_GET['id'];
   $sql1       = "DELETE FROM vsga WHERE id = '$id'";
   $q1         = mysqli_query($koneksi,$sql1);
   if($q1){
      $sukses = "Berhasil hapus data";
   }else{
      $error  = "Gagal melakukan delete data";
   }
}
if ($op == 'edit') {
   $id         = $_GET['id'];
   $sql1       = "SELECT * FROM vsga WHERE id = '$id'";
   $q1         = mysqli_query($koneksi, $sql1);
   $r1         = mysqli_fetch_array($q1);
   $nama         = $r1['nama'];
   $univ      = $r1['univ'];
   $alamat     = $r1['alamat'];
   $jenispelatihan   = $r1['jenis'];

   if ($nama == '') {
         $error = "Data tidak ditemukan";
   }
}
if (isset($_POST['simpan'])) { //untuk create
   $nama             = $_POST['nama'];
   $univ             = $_POST['univ'];
   $alamat           = $_POST['alamat'];
   $jenispelatihan   = $_POST['jenis'];

   if ($nama && $univ && $alamat && $jenispelatihan) {
      if ($op == 'edit') { //untuk update
         $sql1       = "UPDATE vsga SET nama = '$nama',univ='$univ',alamat = '$alamat',jenis ='$jenispelatihan' WHERE id = '$id'";
         $q1         = mysqli_query($koneksi, $sql1);
         if ($q1) {
            $sukses = "Data berhasil diupdate";
         } else {
            $error  = "Data gagal diupdate";
         }
      } else { //untuk insert
            $sql1   = "INSERT INTO vsga(nama, univ, alamat, jenis) VALUES ('$nama','$univ','$alamat','$jenispelatihan')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
               $sukses     = "Berhasil memasukkan data baru";
            } else {
               $error      = "Gagal memasukkan data";
            }
      }
   } else {
      $error = "Silakan masukkan semua data";
   }
}
?> 


<!doctype html>
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
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg bg-transparent fixed-top w-100">
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
      <!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid" id="home">
         <div class="container">
            <div class="row">
               <div class="col-10 offset-1">
                  <h2 class="display-4 fadeInDown">Digitalent<span> Kominfo</span></h2>
                  <p class="text-light fw-semibold text-monospace">Vocational School Graduate Academy - Junior Web Developer</p>
                  <a href="./index.html">
                     <button type="button" class="btn fadeIn btn-secondary my-2" id="tombol">Join Now!</button>
                  </a>
               </div>
            </div>
         </div>
      </div>

      <!-- form -->
      <div class="mx-auto">
      <!-- untuk memasukkan data -->
      <div class="card">
         <div class="card-header">
         Ayo Daftar VSGA sekarang!!
         </div>
         <div class="card-body">
            <?php
            if ($error) {
            ?>
            <div class="alert alert-danger" role="alert">
               <?php echo $error ?>
            </div>
            <?php
            header("refresh:5;url=index.php");//5 : detik
            }
            ?>
            <?php
            if ($sukses) {
            ?>
            <div class="alert alert-success" role="alert">
               <?php echo $sukses ?>
            </div>
            <?php
            header("refresh:5;url=index.php");
            }
            ?>
            <form action="" method="POST">
               <div class="mb-3 row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                  </div>
               </div>
               <div class="mb-3 row">
                  <label for="univ" class="col-sm-2 col-form-label">Universitas</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="univ" name="univ" value="<?php echo $univ ?>">
                  </div>
               </div>
               <div class="mb-3 row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                  </div>
               </div>
               <div class="mb-3 row">
                  <label for="jenis-pelatihan" class="col-sm-2 col-form-label">Jenis Pelatihan</label>
                  <div class="col-sm-10">
                     <select class="form-control" name="jenis" id="jenis-pelatihan">
                        <option value="">- Pilih Pelatihan -</option>
                        <option value="PNPST" <?php if ($jenispelatihan == "PNPST") echo "selected" ?>>PNPST</option>
                        <option value="OKM" <?php if ($jenispelatihan == "OKM") echo "selected" ?>>OKM</option>
                        <option value="JWD" <?php if ($jenispelatihan == "JWD") echo "selected" ?>>JWD</option>
                        </select>
                  </div>
               </div>
               <div class="col-12">
                  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
               </div>
            </form>
         </div>
      </div>
      <!-- Untuk mengeluarkan data -->
      <!-- <div class="card">
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
         </div> -->
      <!-- <h1 class="mt-5">Hello, world!</h1>
      <button type="button" class="btn btn-primary">Primary</button> -->
      <script src="./src/js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
   </body>
</html>