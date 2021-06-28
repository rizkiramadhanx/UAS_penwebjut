<?php
require "fungsi.php";
$query = "SELECT * from barang";
var_dump(viewData($query)); ?>
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
        $data = mysqli_query($koneksi, "select * from barang");
        while ($row = mysqli_fetch_array($data)) { ?>
            <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $row['id_kategori'] ?></td>
                <td><?php echo $row['merk'] ?></td>
                <td><?php echo $row['deskripsi'] ?></td>
                <td><?php echo $row['harga'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>