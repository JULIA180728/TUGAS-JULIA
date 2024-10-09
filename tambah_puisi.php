<?php
require_once("config.php");

if (isset($_POST['submit'])) {
    // Mengambil data dari form
    $isi_puisi = filter_input(INPUT_POST, 'isi_puisi', FILTER_SANITIZE_STRING);

    // Menyiapkan query untuk menyimpan puisi
    $sql = "INSERT INTO puisi (isi_puisi) VALUES (:isi_puisi)";
    $stmt = $db->prepare($sql);
    
    // Eksekusi query
    if ($stmt->execute([':isi_puisi' => $isi_puisi])) {
        // Redirect setelah sukses
        header("Location: puisi.php");
        exit();
    } else {
        echo "Gagal menambahkan puisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Puisi</title> 
</head>
<body>
    <form method="POST">
        <textarea name="isi_puisi" required><?php echo "Mata itu jendela jiwa,
                                                        Tempat bersemayam sejuta rasa,
                                                        Dengan tatap yang penuh cerita,
                                                        Menggambarkan harapan dan duka.

                                                        Dalam sinar lembut cahaya,
                                                        Mata berbicara tanpa suara,
                                                        Menyimpan rahasia yang tak terungkap,
                                                        Membawa kasih, menghapus keluh kesah.

                                                        Saat mereka bercahaya ceria,
                                                        Seolah menari dalam kebahagiaan,
                                                        Namun, dalam kedalaman air mata,
                                                        Terpendam kesedihan yang tak terbayangkan.

                                                        Mata mampu merasakan dunia,
                                                        Melihat keindahan dan luka,
                                                        Mereka adalah cermin kehidupan,
                                                        Menunjukkan kebenaran, menyuarakan harapan.

                                                        Oh, mata yang tak pernah berbohong,
                                                        Setiap tatap menciptakan lagu,
                                                        Biarkan mereka berbicara, bersinar,
                                                        Karena dari situlah cinta mulai tumbuh."; ?></textarea>
        <br>
        <button type="submit" name="submit">Tambahkan Puisi</button>
    </form>
</body>
</html>
