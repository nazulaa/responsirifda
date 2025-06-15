
## Deskripsi Produk
Website berbasiskan GIS "Reccomenate" merupakan situs web yang menyediakan informasi (sebaran dan rekomendasi) tempat makan dan cafe di kota bogor dengan menampilkan review serta peta interaktif dengan informasi pelengkap dari tempat tersebut dengan tujuan memudahkan wisatawan yang ingin mencari tempat makan menarik atau pun mahasiswa yang ingin mencari spot untuk nugas.

Beberapa Tujuan Pembuatan Produk adalah :

1. Mempermudah pencarian cafe dan rumah makan bagi wisatawan dan mahasiswa
2. Menyajikan informasi Bogor yang mudah diakses dan interaktif
3. Membantu analisis dan pemahaman lokasi lahan di Bogor
4. Menyediakan informasi lebih lanjut mengenai Kota Bogor seperti jumlah penduduk, jumlah wisatawan, dan kondisi penggunaan lahan
5. Menyediakan informasi mengenai jumlah rumah makan dan jumlah wisatawan dalam kurun beberapa tahun Kota Bogor yang dapat digunakan untuk analisis

## Sasaran Produk
- Mahasiswa : Mahasiswa Jabodetabek yang ingin mencari udara segar dengan mengunjungi kafe di Kota Bogor atau pun mahasiswa yang ingin mencari suasana baru untuk mengerjakan tugas
- Penduduk setempat (semua golongan) : Penduduk yang ingin mencari tempat makan di sekitarnya yang enak dan menarik
- Wisatawan : Wisatawan yang berkunjung untuk menjelajahi tempat wisata dan rumah makan atau cafe menarik di Kota Bogor
- Surveyor/Analyst : Mempermudah memperoleh akses distribusi penggunaan lahan dan data statistik di Kota Bogor yang interaktif 
---

## Komponen Pembangun Produk

1. **Frontend:**
   - CSS : Untuk tampilan UI Sederhana
   - SCSS : Untuk tampilan UI yang lebih kompleks (pembuatan parallax scrolling (home))
   - LeafletJS : Library untuk tampilan peta interaktif
   - FontAwesome : Icon
   - Javascript : Chart dan Parallax scrolling

2. **Backend:**
   - Framework: Bootstrap
   - HTML : Struktur Utama Isi Website`
   - Javascript : Inisialisasi Peta Interaktif dan Visualisasi Charts
   - GeoJSON : File untuk menampilkan data titik, garis, area

3. **Integrasi Lain:**
   - API: GoogleFonts API (Fonts)
   - API: Google Collaboratory (Data Keseluruhan)
   - Server: GeoServer


---

## Visualisasi
   - Klasifikasi Data Statistik Jumlah Restoran Pada Peta dengan berdasarkan tingkatan jumlah alami (Natural Breaks)
   - Line Graph Data Statistik Perkembangan Kunjungan Wisata Kota Bogor tahun 2008-2014
   - Bar Graph Jumlah Penduduk Kota Bogor 2024
   - Visualisasi Peta Penggunaan Lahan

---

## Sumber Data

- Data sebaran cafe : Scraping Google Collaboratory
- Data jumlah penduduk, Jumlah Rumah Makan, Data Kunjungan Wisatawan : https://bogorkota.bps.go.id
- Data Area Bogor : https://www.indonesia-geospasial.com/2020/01/shp-rbi-provinsi-jawa-barat-perwilayah.html?m=1
- Informasi Umum Kota Bogor : https://id.m.wikipedia.org/wiki/Kota_Bogor
- Data Penggunaan Lahan : https://tanahair.indonesia.go.id/portal-web/

---

Created By : Rifda Najla Azzahra (23/523111/SV/23854) on June 2025