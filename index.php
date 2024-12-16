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
        /* Gaya CSS seperti di awal */
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
            border: 1px solid #ffffff;
            margin-bottom: 50px;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #efe9e1;
        }

        th {
            background-color: #ac9c8d;
            color: white;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #ffe6ee;
        }

        tr:hover {
            background-color:rgb(205, 84, 100);
            color: #efe9e1;
        }

        #map {
            height: 700px;
            width: 90%;
            margin: 20px auto;
            border: 1px solid #ffff;
            border-radius: 50px;
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

        .nav-link {
            color: #741d29;
            margin-left: 15px;
            font-size: 1.5rem;
        }

        .nav-link:hover {
            color: #ac9c8d !important;
        }

        .navbar-toggler-icon {
            background-color: #efe9e1;
        }

        .navbar-brand i {
            margin-right: 8px;
        }

        .navbar-brand .text-satu {
            color: #741d29;
            /* Warna biru untuk teks pertama */
        }

        .navbar-brand .text-dua {
            color: #741d29;
            /* Warna abu-abu untuk teks kedua */
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 100px;
        }

        .navbar-nav .nav-item .nav-link {
            font-family: 'Kanit', sans-serif;
            /* Ganti dengan font yang diinginkan */
            font-size: 20px;
            /* Ukuran font */
            font-weight: 500;
            /* Ketebalan font */
            color: #741d29;
            /* Warna font */
            text-transform: uppercase;
            /* Membuat teks menjadi huruf besar */
            transition: color 0.3s ease;
            /* Animasi saat hover */
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #741d29;
            /* Warna saat hover */
        }

        .section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            transition: transform 0.6s ease, opacity 0.6s ease;
            gap: 2rem;
            padding: 2rem 2rem;
            margin: 4rem;
            overflow: hidden;
            opacity: 0;
            /* Awalnya tidak terlihat */
            position: relative;
            background: #efe9e1;
            transform: translateY(-50px);
            /* Parallax efek awal */
            box-shadow: 0 0 20px rgb(26, 6, 9);
            border-radius: 40px;
        }

        .section.visible {
            opacity: 1;
            /* Menjadi terlihat */
            transform: translateY(0);
            /* Kembali ke posisi normal */
        }

        .section.parallax {
            will-change: transform, opacity;
            /* Optimalisasi rendering */
        }


        .section__data {
            flex: 2;
            min-width: 300px;
        }

        .section__link {
            margin-top: 105px;
            border: 3px dashed #741d29;
            padding: 8px;
            border-radius: 50px;
        }

        .section__img {
            flex: 2;
            max-width: clamp(200px, 50vw, 500px);
            width: 100%;
            height: 300px;
            border-radius: 0.5rem;
        }

        .section__title{
            font-family: 'Kanit', sans-serif;
            color: #741d29;
            text-align: center;
            width: 100%;
        }

        .l-section h4 {
    color: #322d29; 
    font-family: 'Kanit', sans-serif;
}

        .section__text .h4{
            font-family: 'Kanit', sans-serif;
            color: #741d29;
            text-align: center;
            width: 100%;
        }

        /*===== MEDIA QUERIES =====*/
        @media screen and (max-width: 480px) {
            .nav {
                font-size: 0.875rem;
            }

            .home__title {
                font-size: 2rem;
            }

            .home__subtitle {
                font-size: 1rem;
            }

            .section {
                padding: 1rem;
                gap: 1rem;
            }

            .section__img {
                max-width: 300px;
            }

            .nav__menu {
                height: 50%;
            }
        }

        @media screen and (min-width: 481px) and (max-width: 768px) {
            .section {
                padding: 1.5rem;
                gap: 1.5rem;
            }

            .home__title {
                font-size: 2.5rem;
            }

            .home__subtitle {
                font-size: 1.25rem;
            }
        }

        @media screen and (min-width: 1200px) {
            .bd-grid {
                margin-left: 50%;
                margin-right: 50%;
            }
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
                <span class="text-satu"> R8 </span>
                <span class="text-dua"> Reccomenate </span>
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

    <!-- Div untuk peta -->
    <div id="map"></div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = ""; // Kosongkan jika tidak ada password
    $dbname = "reccomenate";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk mengambil semua data dari tabel atee
    $sql = "SELECT * FROM atee";
    $result = $conn->query($sql);

    $locations = []; // Array untuk menyimpan lokasi

    if ($result->num_rows > 0) {
        echo "<table><tr>
                <th>Cafe</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Nomor</th>
                <th>Alamat</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            // Menyimpan data lokasi untuk peta
            $locations[] = [
                'cafe' => $row["cafe"],
                'longitude' => $row["longitude"],
                'latitude' => $row["latitude"]
            ];

            echo "<tr>
                    <td>" . htmlspecialchars($row["cafe"]) . "</td>
                    <td>" . htmlspecialchars($row["longitude"]) . "</td>
                    <td>" . htmlspecialchars($row["latitude"]) . "</td>
                    <td>" . htmlspecialchars($row["nomor"]) . "</td>
                    <td>" . htmlspecialchars($row["alamat"]) . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align: center; color: red;'>0 results</p>";
    }

    $conn->close();
    ?>

    <section class="l-section section--first" id="section1">
        <div class="section">
            <div class="section__data">
                <h2 class="section__title">Popolo Coffee (4.6/5)</h2>
                <h4 class="section__text">Location :</h4>
                <p class="section__text">Sumur Batu, Babakan Madang, Bogor Regency, West Java 16810</p>
                <h4 class="section__text">Open Hours :</h4>
                <p class="section__text">09.00 am - 08.00 pm</p>
                <h4 class="section__text">Price Range :</h4>
                <p class="section__text">Rp 25.000–100.000</p>
                <h4 class="section__text">Top Review :</h4>
                <p class="section__text">Tempatnya asik banget ada outdoor non smoking dan smoking area, juga kalau mau yang adem-ademan ada ruangan ber-ac.
                    Untuk harga minuman standard ya 30ribuan. Jadi lumayan affordable, Menu disini gak cuma kopi, jadi lumayan cocok buat melancong dengan keluarga, karena ada area games gitu, ada area pinjam charger, dan buat anak-anak bisa belajar menggambar, dimana alat gambarnya disediakan.
                </p>
                <h4 class="section__text">More Info :</h4>
                <a href="https://www.instagram.com/popolocoffee?igsh=N2I1Zm1xdGV4MHJx" target="_blank" rel="noopener" class="section__link">Popolo Coffee Instagram</a>
            </div>
            <img src="assets/img/popolocoffee.jpg" alt="" class="section__img">
        </div>
    </section>

    <section class="l-section section--first" id="section1">
        <div class="section">
            <div class="section__data">
                <h2 class="section__title">Lemongrass (4.6/5)</h2>
                <h4 class="section__text">Location :</h4>
                <p class="section__text">Jl. Raya Pajajaran No.21, RT.03/RW.03, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153</p>
                <h4 class="section__text">Open Hours :</h4>
                <p class="section__text">10.00 am - 10.00 pm </p>
                <h4 class="section__text">Price Range :</h4>
                <p class="section__text">Rp 40.000–100.000 </p>
                <h4 class="section__text">Top Review :</h4>
                <p class="section__text">Tempatnya sangat bagus dan instagramable, menu yang kita pesan juga enak dan harganya affordable. Cukup ramai, karena weekend jadi bersiap2 untuk waiting list.
                    Everything is worth to try if you come to Bogor. Restaurant terenak dan nyaman dan pelayanan sangat memuaskan untuk lahan parkiran pun luas view yg sangat bagus dan indah.
                </p>
                <h4 class="section__text">More Info :</h4>
                <a href="https://www.instagram.com/lemongrassresto?igsh=M2VhMTAxdXB1N3h1" target="_blank" rel="noopener" class="section__link"> Lemongrass Instagram</a>
            </div>
            <img src="assets/img/lemongrass.jpg" alt="" class="section__img">
        </div>
    </section>

    <section class="l-section section--first" id="section1">
        <div class="section">
            <div class="section__data">
                <h2 class="section__title">Nicole's Kitchen & Lounge (4.5/5)</h2>
                <h4 class="section__text">Location :</h4>
                <p class="section__text">Kampoeng Brasco, Jl. Raya Cipanas Jl. Raya Hanjawar No.1, Palasari, Kec. Cipanas, Kabupaten Cianjur, Jawa Barat 43253 </p>
                <h4 class="section__text">Open Hours :</h4>
                <p class="section__text">09.00 am - 10.00 pm </p>
                <h4 class="section__text">Price Range :</h4>
                <p class="section__text">Rp 50.000-150.000</p>
                <h4 class="section__text">Top Review :</h4>
                <p class="section__text">Delicious Food with Great atmosphere come with good interior design and decoration. The service is excellent and good attitude of the waiters, love the food that we order, beside of delicious and good, serving of the food also so fast. They are not allowed outside foods to bring,
                    so if you bring a mineral water or either any finger foods then you should keep it with the cashiers after that you can take it back with you. So far we are very enjoy the view, decoration and also the weather, it is an open air cafe so if you come for dinner then should wear a long jacket or long sleeve to avoid cold.
                </p>
                <h4 class="section__text">More Info :</h4>
                <a href="https://www.instagram.com/nicoleslounge.id?igsh=ZzVhOGIzdXZuc2Q1" target="_blank" rel="noopener" class="section__link">Nicole's Lounge Instagram</a>
            </div>
            <img src="assets/img/nicole.jpg" alt="" class="section__img">
        </div>
    </section>

    <section class="l-section section--first" id="section1">
        <div class="section">
            <div class="section__data">
                <h2 class="section__title">Baked & Brewed Coffee and Kitchen (4.6/5)</h2>
                <h4 class="section__text">Location :</h4>
                <p class="section__text">Jl. Salak No.6, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16152 </p>
                <h4 class="section__text">Open Hours :</h4>
                <p class="section__text">08.00 am - 10.00 pm </p>
                <h4 class="section__text">Price Range :</h4>
                <p class="section__text">Rp 50.000-100.000</p>
                <h4 class="section__text">Top Review :</h4>
                <p class="section__text">Tempatnya enakeun, adem, luas, pinggir jalan, kalau sore dan duduk diluar keadaan tidak hujan, angin nya sepai sepoi, parkirannya luas, mau duduk diluar atau didalam sama2 semuanya nyaman, cocok buat kalian yang mau wfc juga sendirian.
                    Tempatnya ckup rindang dan comfy, ad indoor dan outdoor utk smoking, meskipun ga merokok kyknya harus coba bgt yg outdoornya krna adem bgt dan suka ad kucing lucu bgt nongkrong tp ga agresif ya.
                </p>
                <h4 class="section__text">More Info :</h4>
                <a href="https://www.instagram.com/bakedandbrewed?igsh=bjNpdGk3b2Uwankx" target="_blank" rel="noopener" class="section__link">Baked & Brewed Instagram</a>
            </div>
            <img src="assets/img/bakedbrewed.jpg" alt="" class="section__img">
        </div>
    </section>

    <section class="l-section section--first" id="section1">
        <div class="section">
            <div class="section__data">
                <h2 class="section__title">Bavarian Haus Bratwurst 'n Grill (4.5/5)</h2>
                <h4 class="section__text">Location :</h4>
                <p class="section__text">Jl. Raya Puncak - Cianjur No.48, Cipayung Datar, Kec. Megamendung, Kabupaten Bogor, Jawa Barat 16770</p>
                <h4 class="section__text">Open Hours :</h4>
                <p class="section__text">08.00 am - 10.00 pm</p>
                <h4 class="section__text">Price Range :</h4>
                <p class="section__text">Rp 50.000-100.000</p>
                <h4 class="section__text">Top Review :</h4>
                <p class="section__text">Kalau lagi mampir ke Bogor dan mau menikmati makanan ala2 Jerman, salah satu pilihan lokasi yang bisa kamu pilih adalah di sini. Selain menawarkan berbagai menu khas Jerman terutama sausage-nya, lokasinya juga sangat memanjakan diri karena bagus banget buat foto-foto dan bersantai2.
                    Jadi ini ibarat paket lengkap sih, memang yang disuguhkan bukan pemandangan alam, tetapi nuansa di dalam restoran-nya itu yang bagus. Tempatnya cukup asik sih, ada temanya gitu. Kalo mau foto-foto, bisa banget dahhh!! Terus karena ini di dataran tinggi, jadi ga begitu gerah walau pun ga pake AC. Tetep adem ayem!
                </p>
                <h4 class="section__text">More Info :</h4>
                <a href="https://www.instagram.com/bavarianhauspuncak?igsh=MW1maDA2dHlkYTd6Mg==" target="_blank" rel="noopener" class="section__link">BavarianHills Instagram</a>
            </div>
            <img src="assets/img/bavarian.jpg" alt="" class="section__img">
        </div>
    </section>

    <section class="l-section section--first" id="section1">
        <div class="section">
            <div class="section__data">
                <h2 class="section__title">Padre - Italian Cuisine in Bogor (4.7/5)</h2>
                <h4 class="section__text">Location :</h4>
                <p class="section__text">Jl. Pajajaran Indah V No.37, Baranangsiang, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16143</p>
                <h4 class="section__text">Open Hours :</h4>
                <p class="section__text">10.00 am - 10.00 pm</p>
                <h4 class="section__text">Price Range :</h4>
                <p class="section__text">Rp 50.000-125.000</p>
                <h4 class="section__text">Top Review :</h4>
                <p class="section__text">First impression aku ini tempatnya lucu dan nyaman banget. Servernya juga ramah dan cepat. Pas udah order disini bakal dikasih complimentary bread untuk appetizer.
                    Tempatnya ada bagian terbuka nya tapi tetap berAC. Makanannya tidak terlalu mahal jadi pesan agak banyak. Ternyata makanannya enak-enak semua, memang tidak besar sekali porsinya tapi semuanya enak.
                    Pesan pizza tuna cukup besar dan enak walaupun sedikit mesti tambah saus tomat. Ubi gorengnya enak sekali pas. Ravioli cream nya juga enak. Tempatnya nyaman bahkan WC nya juga terlihat elok.
                </p>
                <h4 class="section__text">More Info :</h4>
                <a href="https://www.instagram.com/padre.bogor?igsh=MXA2cWphb2NvY3Buaw==" target="_blank" rel="noopener" class="section__link">Padre's Instagram</a>
            </div>
            <img src="assets/img/padre.jpg" alt="" class="section__img">
        </div>
    </section>

    <section class="l-section section--first" id="section1">
        <div class="section">
            <div class="section__data">
                <h2 class="section__title"> Dimitree Coffee & Eatery (4.5/5)</h2>
                <h4 class="section__text">Location :</h4>
                <p class="section__text">Jl. Pangrango No.5, RT.04/RW.04, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128</p>
                <h4 class="section__text">Open Hours :</h4>
                <p class="section__text">8.00 am - 11.00 pm</p>
                <h4 class="section__text">Price Range :</h4>
                <p class="section__text">Rp 25.000-75.000</p>
                <h4 class="section__text">Top Review :</h4>
                <p class="section__text">Hampir seluruh pengunjung memilih untuk duduk di area semi terbuka di belakang yang ornamen serta desainnya menyerupai pantai tropis.
                    Selain karena ruangan tersebut lebih luas dan instagramable, juga karena disana area smoking khusus untuk menikmati sisha yang ditawarkan kafe.
                    Untuk ruangan bebas asapnya ada di bagian depan bersebelahan dengan meja kopi bar. Area ini dipenuhi ornamen ruang yang beragam baik dari segi bentuk, jenis serta warnanya.
                </p>
                <h4 class="section__text">More Info :</h4>
                <a href="https://www.instagram.com/dimitree_" target="_blank" rel="noopener" class="section__link">Dimitree's Instagram</a>
            </div>
            <img src="assets/img/dimitree.jpg" alt="" class="section__img">
        </div>
    </section>

    <section class="l-section section--first" id="section1">
        <div class="section">
            <div class="section__data">
                <h2 class="section__title">Sisi Barat Coffee (4.5/5)</h2>
                <h4 class="section__text">Location :</h4>
                <p class="section__text">Jl. Batu Hulung, RT.02/RW.02, Balungbangjaya, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16116 </p>
                <h4 class="section__text">Open Hours :</h4>
                <p class="section__text">9.00 am - 12.00 am </p>
                <h4 class="section__text">Price Range :</h4>
                <p class="section__text">Rp 25.000-50.000</p>
                <h4 class="section__text">Top Review :</h4>
                <p class="section__text">Masyaallah banget disini adem ya allah enak gamau pulang, tempatnya bersih, luas, instagramble pulak, cocok buat hangout bareng bestie, pacar, kebanyakan tempatnya outdoor ngadep sungai gitu dan diatasnya pohon rindang, cuman ga enaknya kalau hujan, ada semi outdoornya juga cuman ga terlalu luas
                    Ada photoboxnya juga bdw hihi lucu kan buruan dah mampir
                </p>
                <h4 class="section__text">More Info :</h4>
                <a href="https://www.instagram.com/sisibaratcoffee?igsh=MnF2am96MDZtMGR4" target="_blank" rel="noopener" class="section__link">Sisi Barat Coffee Instagram</a>
            </div>
            <img src="assets/img/barat.jpg" alt="" class="section__img">
        </div>
    </section>

    

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-6.6053, 106.8107], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Data lokasi dari PHP
        var locations = <?php echo json_encode($locations); ?>;

        // Definisi ikon kustom
        var customIcon = L.icon({
            iconUrl: 'assets/img/cafe.svg', // URL ke ikon kustom
            iconSize: [32, 32], // Ukuran ikon
            iconAnchor: [16, 32], // Titik jangkar (bagian bawah ikon)
            popupAnchor: [0, -32] // Posisi popup relatif terhadap ikon
        });
        // Tambahkan marker ke peta
        locations.forEach(function(location) {
            if (location.latitude && location.longitude) {
                L.marker([location.latitude, location.longitude], {
                        icon: customIcon
                    })
                    .addTo(map)
                    .bindPopup("<b>" + location.cafe + "</b>");
            }
        });

        // WMS Layers
        var administrasiDesa = L.tileLayer.wms(
            "http://localhost:8080/geoserver/responsi/wms?", // URL Geoserver
            {
                layers: "responsi:Area", // Nama layer
                format: "image/png", // Format output
                transparent: true, // Transparansi layer
                attribution: "Reccomenate Hits Spots", // Atribusi
            }
        );

        // Add WMS Layers to Map
        administrasiDesa.addTo(map);
    </script>
    <script>
        function checkVisibility() {
            const sections = document.querySelectorAll('.section'); // Seleksi elemen dengan kelas 'section'

            sections.forEach(section => {
                const sectionRect = section.getBoundingClientRect();
                const isVisible = sectionRect.top < window.innerHeight && sectionRect.bottom >= 0;

                if (isVisible) {
                    section.classList.add('visible'); // Tambahkan kelas 'visible' saat section terlihat
                } else {
                    section.classList.remove('visible'); // Hapus kelas jika tidak terlihat
                }
            });
        }

        // Event listeners untuk memantau perubahan scroll, load, dan resize
        window.addEventListener('scroll', checkVisibility);
        window.addEventListener('load', checkVisibility);
        window.addEventListener('resize', checkVisibility);

        // Trigger pertama saat halaman dimuat
        checkVisibility();
    </script>

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
            color: #741d29;
            font-family: 'Shrikhand', cursive;
        }

        .footer-description {
            margin: 15px 0;
            font-size: 20px;
            max-width: 75%;
            color: #741d29;
            font-family: 'Kanit', cursive;
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
            color: #741d29;
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
            color: #f4f4f4;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            text-align: center;
            cursor: pointer;
        }

        .btn-whatsapp:hover {
            background-color: #741d29;
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