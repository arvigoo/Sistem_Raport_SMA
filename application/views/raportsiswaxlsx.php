<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
foreach($result as $data){?>

<table>
<thead>
  <tr>
    <th colspan="6">
        <h4>LAPORAN HASIL BELAJAR SMA CENDERAWASIH 2<br></h4>
</th>
  </tr>
</thead>
</table>

<table border='0' width='100%'>
    <tr valign='top'>
        Nomor Induk Siswa   : <?php echo $data[0];?><br>
        Nama Peserta Didik  : <?php echo $data[1];?><br>
        NISN                : <?php echo $data[7];?><br>
    </tr>
    </table>
<?php break;}
?>

<table border='1'>
        <th>No.</th>
        <th>Mata Pelajaran</th>
        <th>KKM</th>
        <th>Pengetahuan</th>
        <th>Praktik</th>
        <th>Sikap</th>

    <?php
    $no = 1;
    $jum = 0;
    foreach($result as $data){
        echo "<tr>
                <td>$no</td>
                <td>$data[2]</td>
                <td>$data[3]</td>
                <td>$data[4]</td>
                <td>$data[5]</td>
                <td>$data[6]</td>
              </tr>";
        $no++;
    }
    ?>
</table>