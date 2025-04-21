<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Post - Cari Novel</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <div class="header">
            <header class="header">
                <h1>Selamat Datang di Cerita Dunia Fantasi</h1>
                <p class="subheading">Masukkan APIKey untuk Mencari Data Novel</p>
            </header>
        </div>

        <div class="container">
            <h2>Masukkan APIKey</h2>
            <form method="POST" action="search.php">
                <label for="apikey">Masukkan API Key:</label>
                <input type="text" id="apikey" name="apikey" placeholder="Masukkan APIKey Anda" required>
                <button type="submit">Cari</button>
            </form>
        </div>

        <footer class="footer">
            <p>&copy; 2025 Data Novel Web | All Rights Reserved</p>
        </footer>

    </body>
</html>