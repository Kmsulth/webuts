<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Inspirasi</title>
    <link rel="stylesheet" href="login2.css">
</head>

<body>
    <div class="login">
        <div class="container">
            <div class="conten">
                <img src="../img/kelasinpirasi.png" alt="">
                <div class="conten-login">
                    <div class="header-login">
                        <ul>
                            <li><a href="#">Masuk</a></li>
                            <li><a href="regis.php">Daftar</a></li>
                        </ul>
                        <hr class="custom-line">
                        <h2>Masuk ke akun Kelas Inspirasi anda</h2>
                        <div class="regis">
                            <form action="login.php" method="post">
                                <?php
                                if (isset($_POST["login"])) {
                                    $username = $_POST["username"];
                                    $pw = $_POST["pw"];
                                    require_once "database.php";
                                    $sql = "SELECT * FROM user WHERE username='$username'";
                                    $result = mysqli_query($conn, $sql);
                                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    if ($user) {
                                        if (password_verify($pw, $user["pw"])) {
                                            session_start();
                                            $_SESSION['username'] = $username; // Simpan nama pengguna ke dalam sesi
                                            header("Location: ../user/index.php");
                                            exit();
                                        } else {
                                            echo "<div class='Peringatan' style='color:red; margin-top:10px;'>**Kata Sandi Anda Salah</div>";
                                        }
                                    } else {
                                        echo "<div class='Peringatan' style='color:red; margin-top:10px;'>**Username Anda Salah</div>";
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <h5><b>Username*</b></h5>
                                    <input type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <h5><b>Kata Sandi*</b></h5>
                                    <input type="password" name="pw" placeholder="Masukkan Kata Sandi">
                                </div>
                                <div class="form-groub" style="width: 100%; display: flex; justify-content: center;">
                                    <input class="submit" type="submit" value="Login" name="login">
                                </div>
                            </form>
                        </div>
                        <hr class="custom-line" style="margin-top: 270px; ">
                        <h5 style="text-align: center;">Belum Memiliki Akun? Silakan <a style="text-decoration: none;"
                                href="regis.php">Daftar</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>