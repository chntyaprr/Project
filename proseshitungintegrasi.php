<?php
include '../koneksi.php';

//jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {
    //data akan disimpan baru 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //nilai yang diinput
        $h = $_POST['h'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $n = $_POST['n'];
        $x = [];

        // Inisialisasi nilai xi (x0, x1, ..., xn)
        $x0=$a;
        $fx0 = (3*pow($x0, 3))+(6*$x0)-5;

        $x1= $x0 + $h;
        $fx1= (3*pow($x1, 3))+(6*$x1)-5;
        
        $x2= $x0 +(2*$h);
        $fx2= (3*pow($x2, 3))+(6*$x2)-5;
        
        $x3=$x0 +(3*$h);
        $fx3= (3*pow($x3, 3))+(6*$x3)-5;

        $x4=$x0 +(4*$h);
        $fx4= (3*pow($x4, 3))+(6*$x4)-5;

    }


        //perhitungan
        $trapezium = ($h/2)*($fx0 +((2*$fx1)+(2*$fx2)+(2*$fx3)+$fx4));
        $simpson = ($h/3)*($fx0 +((4*$fx1)+(2*$fx2)+(4*$fx3)+$fx4));
        $simpson2 = (3/8* $h)*($fx0 +((3*$fx1)+(3*$fx2)+(2*$fx3)+$fx4));

        
        $query = "INSERT INTO integrasi_numerik (h, a, b, n, trapezium, simpson, simpson2) 
              VALUES ('$h', '$a', '$b', '$n', '$trapezium', '$simpson', '$simpson2')";

        if (mysqli_query($koneksi, $query)) {
            $pesan = "Data berhasil disimpan!";
        } else {
            $pesan = "Gagal menyimpan data: " . mysqli_error($koneksi);
        }

        // Kirim balik ke kalkulator dengan hasil
        header("Location: index.php?hasil=$hasil&pesan=" . urlencode($pesan));
        exit;
    }

?>