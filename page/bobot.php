<?php

$q = "select * from bobot order by id";
$q = mysqli_query($conn,$q);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="card-title">List Bobot</h5>
                <div class="card-tools">
                </div>
            </div>
            <div class="card-body">
                <div id="update" style="display: none">
                    <form action="proses/p_bobot.php" method="post">
                        <div class="form-group">
                            <label for="">Bobot</label>
                            <input type="hidden" id="id" name="id">
                            <input type="text" step="any" class="form-control" id="bobot" name="bobot">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-sm btn-info"><i class="fa fa-check-square"></i> Update</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kriteria</th>
                            <th>Kode Kriteria</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; while($h=mysqli_fetch_array($q)) : ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $h['nama'] ?></td>
                            <td><?= $h['kode'] ?></td>
                            <td><?= $h['bobot'] ?></td>
                            <td>
                                <a href="#" onclick="edit('<?= $h['id'] ?>')" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function edit(id) {
        var url = "proses/p_bobot.php?id="+id;
        $.ajax({
            url : url,
            success : function (res) {
                var obj = JSON.parse(res);
                // console.log(res);
                $("#id").val(obj.id);
                $("#bobot").val(obj.bobot);
            }
        })
        $("#update").fadeIn();
    }
</script>
