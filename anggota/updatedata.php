<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../login.php');
} else {
    include "../koneksi.php";
?>
<?php
$timeout = 10;
$logout_redirect_url = "../login.php"; // Set logout URL

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
    <title>Document</title>

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
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
    <!-- Side-Nav -->
    <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
        <ul class="nav flex-column text-white w-100">
        <a href="#" class="nav-link h3 text-white my-2">
          <img src="../assets/img/logoUNSIKA.png" alt="UNSIKA" height="75px" width="75px">
        </a>
        <li href="#" class="nav-link">
          <a class="bx bxs-dashboard" href="index.php"></a>
          <span class="mx-2">Home</span>
        </li>
        <li href="#" class="nav-link">
          <a class="bx bx-user-check" href="profile.php?id=<?php echo $baris['id']?>"></a>
          <span class="mx-2">Profile</span>
        </li>
        <li href="#" class="nav-link">
          <a class="bx bx-book-bookmark" href="buku.php"></a>
          <span class="mx-2">Buku</span>
        </li>
        </ul>
      
      <button><a href="../index.php">Log out</a></button>
    </div>

    <!-- Main Wrapper -->
    <div class="p-1 my-container active-cont">
        <!-- Top Nav -->
        <nav class="navbar top-navbar navbar-light bg-light px-5">
            <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
        </nav>
        <!--End Top Nav -->
        <h3 class="text-dark p-3">PERPUSTAKAAN FASILKOM UNSIKA</h3>
        <p class="px-3">Profile Anggota</p>
        <?php
            include '../koneksi.php';
            $data = mysqli_query($koneksi, "SELECT * FROM anggota ") or die(mysqli_error($koneksi));
            $baris = mysqli_fetch_array($data);
        ?>
        <div class="panel-body px-3">
            <form class="form-horizontal style-form" style="margin-top: 20px;" action="prosesupdate.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">ID Anggota</label>
                    <div class="col-sm-8">
                        <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" value="<?php echo $baris['id']; ?>" autofocus="on" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NPM</label>
                    <div class="col-sm-8">
                        <input name="npm" type="text" id="npm" class="form-control" placeholder="npm" value="<?php echo $baris['npm']; ?>" required />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Username</label>
                    <div class="col-sm-8">
                        <input name="username" type="text" id="username" class="form-control" placeholder="Username" value="<?php echo $baris['username']; ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Password</label>
                    <div class="col-sm-8">
                        <input name="password" type="text" id="password" class="form-control" placeholder="Password" value="<?php echo $baris['password']; ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama" value="<?php echo $baris['nama']; ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-8">
                        <input name="kelas" type="text" id="kelas" class="form-control" placeholder="kelas" value="<?php echo $baris['kelas']; ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Prodi</label>
                    <div class="col-sm-8">
                        <input name="prodi" type="text" id="prodi" class="form-control" placeholder="prodi" value="<?php echo $baris['prodi']; ?>" required />
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary" name="button">Update Data</button>
                        <a href="profile.php" class="btn btn-danger">Batal </a>
                    </div>
                </div>
                <div style="margin-top: 20px;"></div>
            </form>
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