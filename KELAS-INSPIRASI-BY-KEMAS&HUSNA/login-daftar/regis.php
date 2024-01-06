<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Inspirasi</title>
    <link rel="stylesheet" href="regis.css">
</head>

<body>
    <div class="login">
        <div class="container">
            <div class="conten">
                <img src="../img/kelasinpirasi.png" alt="">
                <div class="conten-login">
                    <div class="header-login">
                        <ul>
                            <li><a href="login.php">Masuk</a></li>
                            <li><a href="#">Daftar</a></li>
                        </ul>
                        <hr class="custom-line">

                        <div class="regis">
                            <form action="regis.php" method="post">
                                <?php
                                if (isset($_POST["submit"])) {
                                    $fullname = $_POST["namalengkap"];
                                    $username = $_POST["username"];
                                    $email = $_POST["email"];
                                    $nohp = $_POST["nohp"];
                                    $alamat = $_POST["alamat"];
                                    $pw = $_POST["pw"];
                                    $konfirpw = $_POST["konfir_pw"];
                                    $eror = array();

                                    if (empty($fullname) or empty($username) or empty($email) or empty($nohp) or empty($alamat) or empty($pw) or empty($konfirpw)) {
                                        array_push($eror, "*Pastikan Semua Terisi dengan Benar");
                                    }
                                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        array_push($eror, "*Email tersebut tidak Valid");
                                    }
                                    if (strlen($pw) < 8) {
                                        array_push($eror, "*Kata Sandi harus terdiri dari 8 karakter atau lebih");
                                    }
                                    if ($pw !== $konfirpw) {
                                        array_push($eror, "*Kata Sandi Tidak Sama");
                                    }

                                    if (count($eror) > 0) {
                                        foreach ($eror as $error) {
                                            echo "<div class='Peringatan' style='color:red; margin-top:10px;'>$error</div>";
                                        }
                                    } else {
                                        // Include file database.php
                                        require_once "database.php";

                                        // Hash kata sandi
                                        $hashed_password = password_hash($pw, PASSWORD_DEFAULT);

                                        // Query SQL untuk menyisipkan data ke dalam tabel
                                        $sql = "INSERT INTO user (nama_lengkap, username, email, no_hp, alamat, pw) VALUES ('$fullname','$username', '$email', '$nohp', '$alamat', '$hashed_password')";

                                        // Eksekusi query dan tangani kesalahan
                                        if (mysqli_query($conn, $sql)) {
                                            echo "<div style='color:#00bb19;'>**Regisrasi Berhasil!!</div>";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                        }

                                        // Menutup koneksi database
                                        mysqli_close($conn);
                                    }
                                }
                                ?>

                                <div class="form-group">
                                    <h5><b>Nama Lengkap*</b></h5>
                                    <input type="text" name="namalengkap" placeholder="Nama Lengkap">
                                    <h6>Jika Anda peserta Prakerja, pastikan mengisi nama <br>sesuai dengan Prakerja
                                        Anda</h6>
                                </div>
                                <div class="form-group">
                                    <h5><b>Username*</b></h5>
                                    <input type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <h5><b>Email*</b></h5>
                                    <input type="text" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <h5><b>Nomor Handphone*</b></h5>
                                    <input type="text" name="nohp" placeholder="(contoh:083171725126)">
                                </div>
                                <div class="form-group">
                                    <h5><b>Alamat*</b></h5>
                                    <input type="text" name="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <h5><b>Kata Sandi*</b></h5>
                                    <input type="text" name="pw" placeholder="Kata Sandi">
                                </div>
                                <div class="form-group">
                                    <h5><b>Konfirmasi Kata Sandi*</b></h5>
                                    <input type="text" name="konfir_pw" placeholder="Konfirmasi Kata Sandi">
                                </div>
                                <div class="form-groub" style="width: 100%; display: flex; justify-content: center;">
                                    <input class="submit" type="submit" value="Daftar" name="submit">
                                </div>
                        </div>
                        <hr class="custom-line" style="margin-top: 0px; ">
                        <h5 style="text-align: center;">Sudah punya akun? Silakan <a style="text-decoration: none;"
                                href="login.php">Masuk</a></h5>




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>