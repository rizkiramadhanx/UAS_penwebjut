<?php
require "header.php";
require "fungsi.php"; ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id_barang</th>
            <th scope="col">id_kategori</th>
            <th scope="col">merk</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga</th>
            <th scope="col">Setelah diskon 10%</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $data = mysqli_query($koneksi, "select * from barang where id_kategori != '2'");
        while ($row = mysqli_fetch_array($data)) { ?>
            <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $row['id_kategori'] ?></td>
                <td><?php echo $row['merk'] ?></td>
                <td><?php echo $row['deskripsi'] ?></td>
                <td><?php $harga = number_format($row['harga'], 0, ".", ".");
                    echo "Rp " . $harga ?></td>
                <td><?php $diskon = number_format(((int)$row['harga'] * 0.9), 0, ".", ".");
                    echo "Rp " . $diskon; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require "footer.php"; ?>