<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="plugin/leaflet-search-master/dist/leaflet-search.min.css">
    <link rel="stylesheet" href="plugin/Leaflet.defaultextent-master/dist/leaflet.defaultextent.css">
    <style>
        body {
            background-color: #990033;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            color: #990033;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: #ffffff;
            margin-bottom: 80px;
            margin-top: 100px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ffffff;
        }

        th {
            background-color: #ac9c8d;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #ffe6ee;
        }

        tr:hover {
            background-color:rgb(170, 66, 80);
            color: #efe9e1;
        }
        /* Navbar Customization */
        .navbar {
            background-color: #efe9e1;
            border: 2px solid #741d29;
            box-shadow: 0 0 10px #741d29;
        }

        .navbar-brand {
            color: #efe9e1;
            margin-left: 70px;
            font-size: 2.5rem;
            font-style: bold;
            font-family: 'Shrikhand', cursive;
        }

        .navbar-brand:hover {
            color: #322d29;
            transform: scale(1.15);
      /* Perbesar sedikit */
      transition: transform 0.3s ease-in-out;
      /* Animasi halus */
        }

        .navbar-brand i {
            margin-right: 8px;
        }

        .navbar-brand .text-satu { 
            color: #741d29; /* Warna biru untuk teks pertama */
            font-family: 'Shrikhand', sans-serif;
        }
        .navbar-brand .text-dua {
            color: #741d29; /* Warna abu-abu untuk teks kedua */
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 100px;
        }

        .nav-link {
            color: #741d29;
            margin-left: 15px;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-item .nav-link {
  font-family: 'Kanit', sans-serif; /* Ganti dengan font yang diinginkan */
  font-size: 20px; /* Ukuran font */
  font-weight: 500; /* Ketebalan font */
  color: #741d29; /* Warna font */
  text-transform: uppercase; /* Membuat teks menjadi huruf besar */
  transition: color 0.3s ease; /* Animasi saat hover */
}

.navbar-nav .nav-item .nav-link:hover {
  color: #efe9e1; /* Warna saat hover */
}

        .nav-link:hover {
            color: #741d29 !important;
        }

        .navbar-toggler-icon {
            background-color: #efe9e1;
        }
        h2.text-center.text-white {
            text-align: center;
            font-size: 36px;
            color: #741d29; 
            font-family: 'Kanit', Courier, monospace;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); 
            margin: 20px 0;
            padding: 10px;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        h2.text-center.text-white:hover {
            transform: scale(1.05); 
        }

    </style>
</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
                        <span class="text-satu">      R8 </span> 
                        <span class="text-dua">  Reccomenate </span>
                      </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                        <i class="fa-duotone fa-solid fa-house" style="--fa-primary-color: #ac9c8d; --fa-secondary-color: #741d29; --fa-secondary-opacity: 1;"></i> Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-map"></i> Maps
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php">Our Reccomendation</a></li>
                            <li><a class="dropdown-item" href="allmaps.html">All Around Bogor</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="top.html">
                            <i class="fa-solid fa-layer-group"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link" href="more.php">
                                    <i class="fa-solid fa-cat"></i> Tell Us!
                                </a>
                            </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center text-white"> Cafe Rekomendasi Pengguna </h2>
        <?php
        // Koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "additional"; 

        // Membuat koneksi ke database
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query untuk mengambil data dari tabel "inform"
        $sql = "SELECT * FROM inform";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Rate</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["name"]) . "</td>
                        <td>" . htmlspecialchars($row["address"]) . "</td>
                        <td>" . htmlspecialchars($row["rate"]) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align: center; color: red;'>No results found.</p>";
        }

        $conn->close();
        ?>
    </div>

    <div class="container mt-5">
        <h2 class="text-center text-white">Tambah Data Cafe</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label text-white">Nama Cafe:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label text-white">Alamat:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="rate" class="form-label text-white">Rating:</label>
                <input type="text" class="form-control" id="rate" name="rate" required>
            </div>
            <button type="submit" class="btn btn-danger">Tambah Data</button>
        </form>
    </div>

    <?php
    // Memeriksa apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $rate = $_POST['rate'];

        // Query untuk menyimpan data
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO inform (name, address, rate) VALUES ('$name', '$address', '$rate')";

        if ($conn->query($sql) === TRUE) {
            // Redirect kembali ke halaman yang sama setelah data disimpan
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> About Bogor </title>
    <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .footer {
            margin-top: 100px;
            background-color: #efe9e1;
            padding: 20px 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-logo {
            font-size: 30px;
            font-weight: bold;
            letter-spacing: 5px;
            font-family: 'Shrikhand', cursive;
            color: #741d29;
        }

        .footer-description {
            margin: 15px 0;
            font-size: 20px;
            max-width: 75%;
            color: #741d29;
            font-family: 'Kanit', sans-serif;
        }

        .footer-links {
            display: flex;
            gap: 20px;
            font-size: 20px;
            color: #741d29;
            margin: 20px 0;
            font-family: 'Kanit', cursive;
        }

        .footer-links p {
            margin: 0;
        }

        .footer-social a {
            margin: 0 10px;
            text-decoration: none;
            color: #741d29;
        }

        .footer-copyright {
            margin-top: 20px;
            font-size: 12px;
            color: #c4c4c4;
        }

        /* Style tombol dan gambar */
        .subscribe-container {
            display: flex;
            align-items: center;
            gap: 10px; /* Jarak antara gambar dan tombol */
            margin-top: 10px;
        }

        .profile-img {
            width: 100px; /* Ukuran gambar */
            height: 100px;
            border-radius: 50%; /* Membuat gambar bulat */
            object-fit: cover; /* Agar gambar tidak terdistorsi */
            margin-bottom: 25px;
        }

        .btn-whatsapp {
            display: inline-block;
            padding: 10px 20px;
            background-color: #322d29;
            color: #efe9e1;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            text-align: center;
            cursor: pointer;
        }

        .btn-whatsapp:hover {
            background-color: #741d29;
            color: #efe9e1;
        }
    </style>
</head>
<body>
    <footer class="footer">
        <div class="footer-logo">R8</div>
        <p class="footer-description">Information and 8 Reccomendations of Cafe and Eatery Around Bogor</p>
        <div class="footer-links">
            <p>Rifda Najla Azzahra</p>
            <p>23/523111/SV/23854</p>
        </div>
        <div class="subscribe-container">
            <img src="assets/img/rifda.jpg" alt="Profile Image" class="profile-img">
            <a href="https://wa.me/6285211383126" class="btn-whatsapp" target="_blank">Hit Me Up!</a>
        </div>
        <div class="footer-social">
            <a href="https://github.com/nazulaa" target="_blank">GitHub</a>
            <a href="https://www.instagram.com/rifdaashh?igsh=aWg1aTFlcWgweTF2" target="_blank">Instagram</a>
            <a href="https://www.linkedin.com/in/rifda-najla-azzahra-9a0301291?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">LinkedIn</a>
        </div>
        <div class="footer-copyright">&copy; 2024 SHINORIFZU, INC.</div>
    </footer>
</body>
</html>
