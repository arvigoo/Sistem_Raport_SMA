<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='0' width='100%'>
    <th align="center" aria-colspan="6">
        <td style="font-weight:bold">DATA MATA PELAJARAN SMAS CENDERAWASIH 2</td>
    </th>
    </table>

<table border='1'>
    <tr>
        <th>No.</th>
        <th>Kode Mapel</th>
        <th>Mata Pelajaran</th>
        <th>KKM</th>
    </tr>

    <?php
    $no=1;
    foreach($result as $data){
        echo "<tr>
        <td>$no.</td>
        <td>$data[0]</td>
        <td>$data[1]</td>
        <td>$data[2]</td>
        </tr>";
        $no++;
    }
    ?>
</table>