<?php
require_once("config.php");

$sql = "SELECT * FROM puisi";
$stmt = $db->prepare($sql);
$stmt->execute();

$puisi = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Puisi</title>
</head>
<body>
    <h1>Daftar Puisi</h1>
    <?php if (count($puisi) > 0): ?>
        <ul>
            <?php foreach ($puisi as $item): ?>
                <li><?php echo nl2br(htmlspecialchars($item['isi_puisi'])); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Tidak ada puisi yang ditemukan.</p>
    <?php endif; ?>
</body>
</html>
