<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Page</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <nav>
        <ul>
            <h2>A3 Learning</h2>
            <li><a class="active" href="../Home/HomePage.php">Home</a></li>
            <li><a href="./ArticlePage.php">Article</a></li>
            <li><a href="../Contact/ContactPage.php">Contact</a></li>
            <li><a href="../About/AboutPage.php">About</a></li>
            <li><a href="../../admin/homePage/index.php">Dashboard</a></li>
        </ul>
    </nav>
    <div class="container">
        <?php
        include('../../koneksi.php'); // Include koneksi.php
        $no = 1;  // Membuat variabel $no untuk penomoran baris
        $query = mysqli_query($connection, "SELECT * FROM article"); // Query untuk menampilkan data dari tabel article 
        while ($row = mysqli_fetch_array($query)) { // Perulangan untuk menampilkan data dari tabel article
        ?>
            <article class="article">
                <header>
                    <h1 class="title"><?php echo $row['article_title'] ?></h1>
                    <p class="author"><?php echo $row['author'] ?></p>
                    <p class="date"><?php echo $row['date'] ?></p>
                </header>
                <section class="content">
                    <p><?php echo $row['article_content'] ?>
                    <p>
                </section>
                <footer class="footer">
                    <p>Category: <a href="#"><?php echo $row['category'] ?></a></p>
                </footer>
            </article>
        <?php } ?>
    </div>
</body>

</html>