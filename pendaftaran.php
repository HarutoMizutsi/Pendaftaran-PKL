<!-- Nama Lengkap (type="text")
NIS (type="number")
Email Siswa (<input type="email">)
Kompetensi Keahlian / Jurusan (<input type="radio">)
Pilihan Perusahaan PKL (type="text" atau gunakan <select>)
Kompetensi / Tech Stack yang Dikuasai (<input type="checkbox">)
Alasan Memilih Perusahaan (<textarea>)
Gunakan <button type="submit"> atau <input type="submit">. -->







<?php
// 1. Perhatikan URL browser pada menit [08:24]. Apa yang terjadi pada URL saat data dikirim menggunakan metode GET?
// variable nama muncul di URL

// 2. Berdasarkan penjelasan di menit [10:31], mengapa kita dilarang keras menggunakan metode GET untuk form yang berisi password atau data sensitif?
// pengguna bisa mengubah data variable secara langsung lewat URL

// 3. Apa fungsi utama dari pengecekan isset() yang dipraktikkan pada menit [09:00]?
// untuk memastikan apakah sebuah variable sudah ada data atau tidak (NULL)


$nama = $_POST["nama"]  ?? "";
$nis = $_POST["NIS"] ?? "";
$email = $_POST["email"] ?? "";
$jurusan = $_POST["jurusan"] ?? "";
$perusahaan = $_POST["perusahaan"] ?? "";
$animasi2d = $_POST["animasi2d"] ?? "";
$animasi3d = $_POST["animasi3d"] ?? "";
$modeling = $_POST["modeling"] ?? "";
$alasan = $_POST["alasan"] ?? "";

$kompetensi = "";
if (!empty($animasi2d)) {
    $kompetensi .= "Animasi 2D ";
}
if (!empty($animasi3d)) {
    $kompetensi .= "Animasi 3D ";
}
if (!empty($modeling)) {
    $kompetensi .= "Modeling ";
}

// jika salah satu aja ada yang kosong, maka tidak akan menampilkan data

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nama"]) && empty($nama)) {
    echo "ERROR! pastikan nama telah terisi! <br>";
    }

    if (isset($_POST["NIS"]) && empty($nis)) {
        echo "ERROR! pastikan NIS telah terisi! <br>";
    }

    if (isset($_POST["email"]) && empty($email)) {
        echo "ERROR! pastikan email telah terisi! <br>";
    }

    if (!isset($_POST["jurusan"])) {
        echo "ERROR! pastikan jurusan telah terisi! <br>";
    }

    if (isset($_POST["perusahaan"]) && $perusahaan == "") {
        echo "ERROR! pastikan perusahaan telah dipilih! <br>";
    }

    if (empty($kompetensi)) {
        echo "ERROR! pastikan kompetensi telah terisi! <br>";
    }

    if (isset($_POST["alasan"]) && empty($alasan)) {
        echo "ERROR! pastikan alasan telah terisi! <br> ";
    }
}
echo "Nama : $nama <br>";
echo "NIS : $nis <br>";
echo "Email : $email <br>";
echo "Jurusan : $jurusan <br>";
echo "Perusahaan : $perusahaan <br>";
echo "Kompetensi : $kompetensi <br>";
echo "Alasan : $alasan <br>";

?>

<HTML>
<form action="pendaftaran.php" method="POST">
    Nama Lengkap: <input type="text" name="nama"><br>
    NIS : <input type="number" name="NIS" ><br>
    Email Siswa : <input type="email" name="email"><br>

    Jurusan : <br>    
    <input type="radio" id="tjat" value="TJAT" name="jurusan">
    <label for="tjat">TJAT</label><br>
    <input type="radio" id="sija" value="SIJA" name="jurusan">
    <label for="sija">SIJA</label><br>

    Perusahaan : 
    <select name="perusahaan">
        <option value="">Pilih Perusahaan</option>
        <option value="blackplasmastudio">Black Plasma Studio</option>
        <option value="alanbeckerstudio">Alan Becker Studio</option>
        <option value="mappa">Mappa</option>
        <option value="madhouse">Madhouse</option>
        <option value="disney">Disney</option>
        <option value="dreamworks">DreamWorks</option>
    </select><br>

    Kompetensi :<br>
    <input type="checkbox" id="animasi2d" name="animasi2d" value="animasi2d">
    <label for="animasi2d"> Animasi2d</label><br>
    <input type="checkbox" id="animasi3d" name="animasi3d" value="animasi3d">
    <label for="animasi3d"> Animasi3d</label><br>
    <input type="checkbox" id="modeling" name="modeling" value="modeling">
    <label for="modeling"> Modeling</label><br>

    Alasan memilih perusahaan : <br>
    <textarea name="alasan"></textarea><br><br>

    <button type="submit">submit</button>
</form>
</HTML>