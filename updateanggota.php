<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:login.php');
} else {
    include "koneksi.php";
?>
<?php
$timeout = 10;
$logout_redirect_url = "login.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
  $elapsed_time = time() - $_SESSION['start_time'];
  if ($elapsed_time >= $timeout) {
    session_destroy();
    echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
  }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang Di Perpustakaan FASILKOM UNSIKA</title>
    <!-- bootstrap 5 css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <!-- BOX ICONS CSS-->
    <link
      href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <!-- Side-Nav -->
    <div
      class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column"
      id="sidebar"
    >
      <ul class="nav flex-column text-white w-100">
        <a href="#" class="nav-link h3 text-white my-2">
          <img src="assets/img/logoUNSIKA.png" alt="UNSIKA" height="75px" width="75px">
        </a>
        <li href="#" class="nav-link">
          <a class="bx bxs-dashboard" href="index.php"></a>
          <span class="mx-2">Home</span>
        </li>
        <li href="#" class="nav-link">
          <a class="bx bx-book-bookmark" href="buku.php"></a>
          <span class="mx-2">Buku</span>
        </li>
        <li href="#" class="nav-link">
          <a class="bx bx-user-pin" href="listanggota.php"></a>
          <span class="mx-2">Anggota</span>
        </li>
        <li href="#" class="nav-link">
          <a class="bx bx-book-content" href="peminjaman.php"></a>
          <span class="mx-2">Peminjaman</span>
        </li>
        <li href="#" class="nav-link">
          <a class="bx bx-book-content" type="solid" href="pengembalian.php"></a>
          <span class="mx-2">Pengembalian</span>
        </li>
      </ul>

      
      <button><a href="logout.php">Log out</a></button>
    </div>

    <!-- Main Wrapper -->
    <div class="p-1 my-container active-cont">
      <!-- Top Nav -->
      <nav class="navbar top-navbar navbar-light bg-light px-5">
        <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
      </nav>
      <!--End Top Nav -->
      <h3 class="text-dark p-3">PERPUSTAKAAN FASILKOM UNSIKA
      </h3>
      <h5 class="px-3">Update Anggota</h5>
      <div class="container px-3">
        <?php
            include 'koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id = '$id'") or die(mysqli_error($koneksi));
            $baris = mysqli_fetch_array($data);
        ?>
        <div class="col-md-6">
            <form action="prosesupdateanggota.php?id=<?php echo $id; ?>" method="post">
            <label for="id">ID</label>
            <input type="text" class="form-control" name="id" value="<?php echo $baris['id']; ?>">
            <label for="npm">NPM</label>
            <input type="text" class="form-control" name="npm" value="<?php echo $baris['npm']; ?>">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $baris['username']; ?>">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" value="<?php echo $baris['password']; ?>">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $baris['nama']; ?>">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" name="kelas" value="<?php echo $baris['kelas']; ?>">
            <label for="prodi">Prodi</label>
            <input type="text" class="form-control" name="prodi" value="<?php echo $baris['prodi']; ?>">
            <br>
            <button type="submit" class="btn btn-primary" name="button">Update Data</button>
        </form>
        </div>
      </div>
    </div>

    <!-- bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
    <!-- custom js -->
    <script>
      var menu_btn = document.querySelector("#menu-btn");
      var sidebar = document.querySelector("#sidebar");
      var container = document.querySelector(".my-container");
      menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
      });
    </script>
</body>
</html>