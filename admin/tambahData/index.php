<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form dan mengecek apakah data sudah diisi atau belum 
    $article_title = isset($_POST['article_title']) ? $_POST['article_title'] : '';
    $author = isset($_POST['author']) ? $_POST['author'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $article_content = isset($_POST['article_content']) ? $_POST['article_content'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';

    // menyiapkan query
    $stmt = $connection->prepare("INSERT INTO article (article_title, author, date, article_content, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $article_title, $author, $date, $article_content, $category);

    // menjalanakan query dan mengecek apakah data berhasil disimpan atau tidak
    if ($stmt->execute()) {
        // Kembali ke halaman home
        header("location: ../homePage/index.php");
        exit;
    } else {
        // Menampilkan pesan error jika data gagal disimpan
        echo "Data Gagal Disimpan!";
    }

    // menutup statement
    $stmt->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Data Artikel</title>
</head>

<body>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <a href="../homePage/index.php" class="btn btn-success">
                            BACK
                        </a>
                        ADD ARTICLE
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label>Article Title</label>
                                <input type="text" name="article_title" placeholder="Masukkan Nama Artikel" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" name="author" placeholder="Masukkan Nama Author" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Upload Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Article Content</label>
                                <textarea name="article_content" id="article_content" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="category" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>