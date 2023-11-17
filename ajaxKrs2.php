<?php
    require "fungsi.php";

    $rs = search('kultawar','idmatkul='.$_POST['mk']);
    if(mysqli_num_rows($rs) == 0)
    {
        echo "Mata kuliah tidak ditawarkan";
    }
    else
    {
    ?>
        <table class=" table table-hover table-bordered">
            <tr>
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Dosen</th>
                <th>Jam Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        <?php
            $i = 1;
            while($data = mysqli_fetch_object($rs))
            {
                $matkul = search('matkul','id='.$_POST['mk']);
                $datamatkul = mysqli_fetch_object($matkul);
                $dosen = search('dosen',"npp='".$data->npp."'");
                $datadosen = mysqli_fetch_object($dosen);
        ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $datamatkul->idmatkul?></td>
                <td><?php echo $datamatkul->namamatkul?></td>
                <td><?php echo $datadosen->namadosen?></td>
                <td><?php echo $data->hari," ",$data->jamkul?></td>
                <td><?php echo $datamatkul->sks?></td>
                <td>Pilih</td>
            </tr>
        <?php
                $i++;
            }

        ?>
        </table>
    <?php
    }