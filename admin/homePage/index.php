<?php
include('../../koneksi.php'); // Pastikan koneksi disertakan terlebih dahulu

// Periksa apakah 'id' ada di URL sebelum menggunakannya
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM article WHERE id_article = $id";
    if ($connection->query($query)) {
        header("location: index.php");
        exit(); // Pastikan untuk menghentikan eksekusi setelah redirect
    } else {
        echo "DATA GAGAL DIHAPUS!";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Halaman Admin</title>
</head>

<body>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="../../Interface/Home/HomePage.php" class="btn btn-success">
                            BACK TO HOME
                        </a>
                        ARTICLE DATA
                    </div>
                    <div class="card-body">
                        <a href="../tambahData/index.php" class="btn btn-md btn-success" style="margin-bottom: 10px">ADD ARTICLE</a>
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">NO.</th>
                                    <th scope="col">Article Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Article Content</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../../koneksi.php'); // Include koneksi.php
                                $no = 1;  // Membuat variabel $no untuk penomoran baris
                                $query = mysqli_query($connection, "SELECT * FROM article"); // Query untuk menampilkan data dari tabel article 
                                while ($row = mysqli_fetch_array($query)) { // Perulangan untuk menampilkan data dari tabel article
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['article_title'] ?></td>
                                        <td><?php echo $row['author'] ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                        <td><?php echo $row['article_content'] ?></td>
                                        <td><?php echo $row['category'] ?></td>
                                        <td class="text-center">
                                            <a href="index.php?id=<?php echo $row['id_article'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">DELETE</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
</body>

</html>