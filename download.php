<?php
    $num = $_GET['table'];

    $file = "forms/$num.csv";

    if (file_exists($file)) {
        $fp = fopen($file, 'r');

        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($file));

        fpassthru($fp);
        fclose($fp);
        exit;
    } else {
        echo 'Файл не найден.';
    }

header("Location: http://localhost/analytics/admin_history.php");
?>