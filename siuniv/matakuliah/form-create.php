<?php

include '../connect.php';

$query = "SELECT id_dosen, nama_dosen FROM dosen";
$result = mysqli_query($connect, $query);


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Siuniv</title>
</head>
<body>
    <h1> Tambah Data Matakuliah </h1>
    <form action="create.php" method="post">
        <tr>
        <td><label for="kode">Kode</label></td><td> : </td>
        <td><input type="text" name="kode"><br><br></td>
</tr>
<tr>
<td><label for="nama_matkul">Matakuliah</label></td><td> : </td>
        <td><input type="text" name="nama_matkul"><br><br></td>
</tr>
<tr>
<td><label for="sks">SKS</label></td><td> : </td>
        <td><input type="number" name="sks"><br><br></td>
</tr>
<tr>
<td><label for="semester">Semester</label></td><td> : </td>
        <td><input type="number" name="semester"><br><br></td>
</tr>
<tr>
<td><label for="nama_dosen">Dosen Pengajar</label></td>
            <td> : </td>
        <td><select name="id_dosen" id="nama_dosen">
            <option value="-">--Pilih salah satu--</option> 
        <?php
while ($data = mysqli_fetch_assoc($result)) {
    ?>
    <option value="<?php echo $data['id_dosen']; ?>">
    <?php echo $data['nama_dosen']; ?>
</option>
<?php
}
?>    
</select>
</td>
</tr>
        <br><br><input type="submit" value="Simpan" name="btnSimpan">
</form>
</body>