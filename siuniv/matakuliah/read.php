<?php

include '../connect.php';

$query = "SELECT kode, nama_matkul, sks, semester, nama_dosen
          FROM matakuliah LEFT JOIN dosen
          USING (id_dosen)
          ORDER BY kode";

$result = mysqli_query($connect, $query);

$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Siuniv</title>
    </head>
    <body>
        <h2>Data Matakuliah</h2>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Matakuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Dosen Pengajar</th>
                <th>Aksi</th>
            </tr>
            <?php
if($num > 0){
    $no = 1;
    while ($data = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td> <?php echo $no; ?> </td>
        <td> <?php echo $data['kode']; ?> </td>
        <td> <?php echo $data['nama_matkul']; ?> </td>
        <td> <?php echo $data['sks']; ?> </td>
        <td> <?php echo $data['semester']; ?> </td>
        <td> <?php
        if($data['nama_dosen'] != NULL){
            echo $data['nama_dosen'];
        }else{echo "-";}
        ?> 
        </td>
        <td> <a href="form-update.php?kode=<?php echo $data['kode']; ?>">Edit </a> | 
        <a href="delete.php?kode=<?php echo $data['kode']; ?>" onclick="return confirm('Anda yakin ingin menghapus data?')">Hapus</a>
    </td>
    </tr>
    <?php
    }
}else{
    echo "<tr> <td colspan='7'> Tidak ada data </td></tr>";
}
?>
</table>
<td> <a href='form-create.php'>Tambah data </a></td>
        <body>
</html>

