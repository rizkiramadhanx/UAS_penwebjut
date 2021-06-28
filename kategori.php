<?php
require "fungsi.php";
require "header.php";
if (isset($_GET["category"])) {
    $kategori = $_GET["category"];
} else {
    $kategori = 'Tas';
}
$query0 = mysqli_query($koneksi, "SELECT * FROM kategori");
$query1 = mysqli_query($koneksi, "select * from barang left JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE kategori = '$kategori'")
?>
<div class="dropdown my-3">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
        if (isset($_GET["category"])) {
            echo $kategori;
        } else {
            echo "Pilih Kategori";
        }
        ?>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <?php if (mysqli_num_rows($query0)) { ?>
            <?php while ($row_kat = mysqli_fetch_array($query0)) { ?>
                <li><a class="dropdown-item" href="kategori.php?category=<?php echo $row_kat["kategori"] ?>"><?php echo $row_kat["kategori"]; ?></a></li>
            <?php } ?>
        <?php } ?>

    </ul>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id_barang</th>
            <th scope="col">id_kategori</th>
            <th scope="col">merk</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_array($query1)) { ?>
            <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $row['id_kategori'] ?></td>
                <td><?php echo $row['merk'] ?></td>
                <td><?php echo $row['deskripsi'] ?></td>
                <td><?php $harga = number_format($row['harga'], 0, ".", ".");
                    echo "Rp " . $harga ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require "footer.php" ?>