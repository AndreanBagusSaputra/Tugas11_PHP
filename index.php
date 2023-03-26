<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pajak</title>
</head>
<body>
    <form action="" method="post">
        <form action="" method="post">
        <h1>Form Pajak</h1>
        <label for="">Nama</label>
            <input type="text" name="nama" placeholder="Masukan Nama" id=""><br><br>
        <label for="">Jabatan</label>
        <select name="jabatan" id="">
            <option>- Pilih Jabatan -</option>
            <option value="Manager">Manager</option>
            <option value="Asisten">Asisten</option>
            <option value="Kepala Bagian">Kepala Bagian</option>
            <option value="Staff">Staff</option>
        </select><br><br>
        <label for="">Status</label>
        <select name="status" id="">
            <option>- Status -</option>
            <option value="Menikah">Menikah</option>
            <option value="Belum Menikah">Belum Menikah</option>
        </select><br><br>
        <label for="">Jumlah Anak</label>
        <select name="jumlah" id="">
            <option>- Jumlah Anak -</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>
        <label for="">Agama</label>
        <select name="agama" id="">
            <option value="Muslim">Muslim</option>
            <option value="Non muslim">Non muslim</option>
        </select><br><br>
        
        <button type="submit" name="proses">Simpan</button>
    </form>

    <?php
    $nama = $_POST ['nama'];
    $jabatan = $_POST ['jabatan'];
    $status = $_POST ['status'];
    $jml_anak = $_POST ['jumlah'];
    $agama = $_POST ['agama'];
    $tombol = $_POST ['proses'];

    switch ($jabatan){
        case "Manager" : $gaji_pokok = 20000000; break;
        case "Asisten" : $gaji_pokok = 15000000; break;
        case "Kepala Bagian " : $gaji_pokok = 10000000; break;
        case "Staff" : $gaji_pokok = 4000000; break;
        default : $gaji_pokok = 0;
    }

    if ($status == "Menikah" && $jml_anak <= 2) $tng_keluarga = 0.05 * $gaji_pokok;
    else if ($status == "Menikah" && $jml_anak <= 5) $tng_keluarga =  0.1 * $gaji_pokok;
    else $tng_keluarga = "-";

    $bruto = $gaji_pokok + $tng_keluarga;

    $zakat = ($agama == "Muslim" && $bruto >= 6000000) ? (0.025 * $bruto ) : 0;

    $take_home_pay = $bruto - $zakat;

    if (isset($tombol)){
        ?>
        Nama : <?= $nama ?>
        <br> Jabatan : <?= $jabatan ?>
        <br> Gaji Pokok : <?=$gaji_pokok?>
        <br> Agama : <?=$agama?>
        <br> Status : <?= $status ?>
        <br> Jumlah Anak : <?= $jml_anak ?>
        <br> Tunjangan Keluarga : <?= $tng_keluarga?>
        <br> Gaji Kotor : <?=$bruto?>
        <br> Zakat : <?=$zakat?>
        <br> Gaji Bersih : <?=$take_home_pay?>
    <?php
    }

?>
</body>
</html>