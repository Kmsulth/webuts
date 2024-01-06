<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Inspirasi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="side-nav">
            <img class="logo" src="../img/LOGO.png" alt="">
            <div class="nav-isi">
                <ul>
                    <li><a href="">Diskon</a></li>
                    <li><a href="">Kelas</a></li>
                    <li><a href="">About Us</a></li>
                </ul>
            </div>
        </div>
        <div class="button">
            <h5>
                <?php
                // Mulai sesi untuk mengakses data pengguna
                session_start();

                // Periksa apakah pengguna sudah login
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo "<div class='username'>
                        Welcome, $username !
                    </div>";
                    echo '                <div class="button-log-out"><a href="../login-daftar/logout.php">
                    Logout
                </a>
                </div> ';
                } else {
                    echo "Welcome, Guest!";
                }
                ?>
            </h5>
            <img class="icon" src="../icon/iconuser.png" alt="" width="50px">
        </div>
    </nav>
    <div class="main">
        <div class="conten">
            <img class="baner" src="../img/banerkelasin.png" alt="">
            <div class="tutor-member">
                <div class="tutor">
                    <h4>Tutor Tutor Unggulan di Kelas Inspirasi</h4>
                    <?php
                    // Ambil data dari database dan tampilkan dalam div
                    require_once "../login-daftar/database.php"; // Include file koneksi database
                    
                    $sql = "SELECT * FROM tbl_tutor";
                    $result = $conn->query($sql);
                    $sqla = "SELECT * FROM tbl_diskon";
                    $resulta = $conn->query($sqla);
                    $sqlkelas = "SELECT * FROM tbl_kelas";
                    $resultkelas = $conn->query($sqlkelas);

                    if ($result->num_rows > 0) {
                        echo '<div class="tutors-wrapper">';
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="tutor-container"> <a href="">';
                            echo '<img src="../foto/' . $row['foto'] . '" alt="Foto Tutor">';
                            echo '<div class="tutor-nama">' . $row['nama_tutor'] . '</div>';
                            echo '</a></div>';
                        }
                        echo '</div>';
                    } else {
                        echo "Tidak ada data tutor yang ditemukan.";
                    }

                    $conn->close();
                    ?>
                    <div><a href=""></a></div>
                </div>

                <div class="member">
                    <h4>Apa Kata Member?</h4>
                    <div class="member-des">
                        <a href="">
                            <img src="../foto/member.png" alt="">
                        </a>
                        <div class="des-member">
                            <h5>Saya telah mengalami banyak peningkatan diri, baik itu dalam hal soft skill maupun
                                melalui pengalaman berharga. Salah satu pencapaian signifikan adalah melalui partisipasi
                                aktif dalam Kelas Inspirasi, di mana saya secara penuh berdedikasi untuk melakukan
                                perubahan positif. <br>
                            </h5>
                            <span>- Kemas M Sultan Resik (Member kelass Inpirasi Since 2015)</span>
                        </div>
                    </div>
                </div>

                <div class="diskon">
                    <h1>Diskon spesial untuk kamu!!</h1>
                    <?php
                    if ($resulta->num_rows > 0) {
                        echo '<div class="wrapper-kupon">';
                        while ($row = $resulta->fetch_assoc()) {
                            echo '<div class="kupon">';
                            echo '<div class="headkupon">' . '<img src="../icon/iconvocer.svg" alt="">' . '<span>' . $row['ket_diskon'] . $row['kode_diskon'] . '</span>' . '</div>';
                            echo '<div class="foterkup">' . '<h6>Berakhir</h6>' . '<span>' . $row['kadaluarsa_diskon'] . '</span>' . '</div>';
                            echo '</div>';
                        }
                        echo '</div>';
                    }
                    ?>
                </div>

                <div class="kelas">
                    <div class="kelas">
                        <?php
                        if ($resultkelas->num_rows > 0) {
                            while ($row = $resultkelas->fetch_assoc()) {
                                echo '<div class="wrapper-kelas">';
                                echo '<img src="../baner/' . $row['baner_kelas'] . '" alt="Foto Tutor">';
                                echo '<div class="des-kelas">';

                                // Loop untuk menampilkan keterangan
                                $keteranganArray = array('ket_kelasa', 'ket_kelasb', 'ket_kelasc', 'ket_kelasd');
                                foreach ($keteranganArray as $keteranganKey) {
                                    echo '<div class="keterangan">';
                                    echo '<img src="../icon/iconckls.png">' . '<p>' . $row[$keteranganKey] . '</p>';
                                    echo '</div>';
                                }

                                echo '</div>';
                                echo '<div class="potongan-harga">';
                                echo 'Rp ' . $row['harga_potongan'];
                                echo '</div>';
                                echo '<div class="des-harga">' .
                                    '<div class="harga">' . 'mulai dari' . '<br>' . '<p>' . 'Rp' . $row['harga_real'] . '</p>' . '</div>' .
                                    '<div class="btn-join"><a href="#">JOIN US</a></div>';
                                echo '</div>';
                                echo '</div>'; // Menutup div wrapper-kelas
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <br><br><br><br><br>
        <div class="kupon">
</body>

</html>