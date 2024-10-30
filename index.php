<?php

$barang = [
    ['id' => 1, 'nama_barang' => 'Buku', 'kategori_barang' => 'Alat Tulis', 'harga_barang' => 20000],
    ['id' => 2, 'nama_barang' => 'Pulpen', 'kategori_barang' => 'Alat Tulis', 'harga_barang' => 5000]
];

if (isset($_POST['submit'])) {
    $id = count($barang) + 1; 
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori_barang'];
    $harga = $_POST['harga_barang'];
    $barang[] = ['id' => $id, 'nama_barang' => $nama, 'kategori_barang' => $kategori, 'harga_barang' => $harga];
}

if (isset($_POST['edit_submit'])) {
    $id_edit = $_POST['edit_id']; 
    $nama_edit = $_POST['edit_nama_barang'];
    $kategori_edit = $_POST['edit_kategori_barang'];
    $harga_edit = $_POST['edit_harga_barang'];

    foreach ($barang as &$item) {
        if ($item['id'] == $id_edit) {
            $item['nama_barang'] = $nama_edit;
            $item['kategori_barang'] = $kategori_edit;
            $item['harga_barang'] = $harga_edit;
            break;
        }
    }
    unset($item); 
}

$edit_id = '';
$edit_nama = '';
$edit_kategori = '';
$edit_harga = '';

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    foreach ($barang as $item) {
        if ($item['id'] == $edit_id) {
            $edit_nama = $item['nama_barang'];
            $edit_kategori = $item['kategori_barang'];
            $edit_harga = $item['harga_barang'];
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Barang</title>
</head>
<body>
    <h3>Tambah Barang</h3>
    <form action="" method="post">
        <label for="nama_barang">Nama Barang: </label>
        <input type="text" id="nama_barang" name="nama_barang" required><br>

        <label for="kategori_barang">Kategori Barang: </label>
        <input type="text" id="kategori_barang" name="kategori_barang" required><br>

        <label for="harga_barang">Harga Barang: </label>
        <input type="number" id="harga_barang" name="harga_barang" required><br>

        <button type="submit" name="submit">Tambah Barang</button>
    </form>

    <h3>Daftar Barang</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        <?php

        foreach ($barang as $item) {
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['nama_barang'] . "</td>";
            echo "<td>" . $item['kategori_barang'] . "</td>";
            echo "<td>" . $item['harga_barang'] . "</td>";
            echo '<td><a href="?edit=' . $item['id'] . '">Edit</a> | <a href="#">Hapus</a></td>';
            echo "</tr>";
        }
        ?>
    </table>

    <h3>Edit Barang</h3>
    <form action="" method="post">
        <label for="edit_id">ID Barang: </label>
        <input type="number" id="edit_id" name="edit_id" value="<?php echo $edit_id; ?>" required><br>

        <label for="edit_nama_barang">Nama Barang: </label>
        <input type="text" id="edit_nama_barang" name="edit_nama_barang" value="<?php echo $edit_nama; ?>" required><br>

        <label for="edit_kategori_barang">Kategori Barang: </label>
        <input type="text" id="edit_kategori_barang" name="edit_kategori_barang" value="<?php echo $edit_kategori; ?>" required><br>

        <label for="edit_harga_barang">Harga Barang: </label>
        <input type="number" id="edit_harga_barang" name="edit_harga_barang" value="<?php echo $edit_harga; ?>" required><br>

        <button type="submit" name="edit_submit">Simpan Perubahan</button>
    </form>
</body>
</html>