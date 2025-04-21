<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hasil Pencarian API</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <div class="container">
            <h2>Hasil Pencarian API</h2>

            <?php

            if (isset($_POST['apikey'])) {
                $apiUrl = 'http://localhost/novel_app/api/novels';
                $apiKey = $_POST['apikey'];

                // Initialize cURL
                $ch = curl_init($apiUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Set the X-API-Key header
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'X-API-Key: ' . $apiKey
                ]);

                // Execute the request
                $response = curl_exec($ch);

                // Error handling
                if ($response === false) {
                    echo '<p class="error">Terjadi kesalahan saat menghubungi API: ' . curl_error($ch) . '</p>';
                } else {
                    $data = json_decode($response, true);
                    if ($data === null) {
                        echo '<p class="error">Gagal memproses respons dari API.</p>';
                        echo '<pre>' . htmlspecialchars($response) . '</pre>';
                    } else {
                        // Tampilkan data
                        if (isset($data['results']) && is_array($data['results'])) {
                            echo "<h3>Hasil Novel:</h3>";
                            echo "<table class='novel-table'>";
                            echo "<thead><tr><th>Judul</th><th>Penulis</th></tr></thead>";
                            echo "<tbody>";
                            foreach ($data['results'] as $novel) {
                                echo "<tr>";
                                if (isset($novel['title'])) {
                                    echo "<td>" . htmlspecialchars($novel['title']) . "</td>";
                                } else {
                                    echo "<td>-</td>";
                                }
                                if (isset($novel['author'])) {
                                    echo "<td>" . htmlspecialchars($novel['author']) . "</td>";
                                } else {
                                    echo "<td>-</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</tbody></table>";
                        } elseif (is_array($data) && count($data) > 0) {
                            // Jika respons langsung array
                            echo "<h3>Hasil Novel:</h3>";
                            echo "<table class='novel-table'>";
                            echo "<thead><tr><th>Judul</th><th>Penulis</th></tr></thead>";
                            echo "<tbody>";
                            foreach ($data as $novel) {
                                echo "<tr>";
                                if (isset($novel['title'])) {
                                    echo "<td>" . htmlspecialchars($novel['title']) . "</td>";
                                } else {
                                    echo "<td>-</td>";
                                }
                                if (isset($novel['author'])) {
                                    echo "<td>" . htmlspecialchars($novel['author']) . "</td>";
                                } else {
                                    echo "<td>-</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</tbody></table>";
                        } else {
                            echo "<p>Tidak ada hasil yang ditemukan untuk API Key ini.</p>";
                            echo '<pre>' . htmlspecialchars(json_encode($data, JSON_PRETTY_PRINT)) . '</pre>';
                        }
                    }
                }

                curl_close($ch);

            } else {
                echo '<p>API Key tidak diterima.</p>';
            }

            ?>

            <p><a href="index.php">Kembali ke Halaman Pencarian</a></p>
        </div>
    </body>

</html>