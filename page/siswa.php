<?php

$q = "select * from siswa order by id";
$q = mysqli_query($conn,$q);
?>
<div class="row">
	<div class="col-md-12">
		<div class="card card-info card-outline">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-list"></i>	List Siswa</h3>
				<div class="card-tools">
					<a href="#" onclick="add()" class="btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Tambah</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-resposive">
					<table class="table table-bordered table-striped datatable">
						<thead>
                        <tr>
                            <th>NO.</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>No. Telp</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Kelas</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; while($h=mysqli_fetch_array($q)) : ?>
                        <tr>
                            <td><?=  $no++ ?>.</td>
                            <td><?= $h['NISN'] ?></td>
                            <td><?= $h['nama_siswa'] ?></td>
                            <td><?= $h['no_telp'] ?></td>
                            <td><?= $h['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                            <td><?= $h['asal_kelas'] ?></td>
                            <td>
                                <a href="#" onclick="edit('<?= $h['id'] ?>')" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="#" onclick="hapus('<?= $h['id'] ?>')" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>
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
<!--modal-->
<div class="modal fade" id="modal-siswa">
    <div class="modal-dialog">
        <div class="modal-content" id="landing-modal">

        </div>
    </div>
</div>
<script>
    function add() {
        var url = "page/form_siswa.php";
        $.ajax({
            url : url,
            success : function (res) {
                $("#landing-modal").html(res);
                $("#modal-siswa").modal('show');
            }
        })
    }

    function edit(id) {
        var url = "page/edit_siswa.php?id="+id;
        $.ajax({
            url : url,
            success : function (res) {
                $("#landing-modal").html(res);
                $("#modal-siswa").modal('show');
            }
        })
    }

    function hapus(id) {
        var con = confirm("Yakin menghapus data ini?");
        if (con){
            window.location.href = 'proses/p_siswa.php?id='+id;
        }
    }
</script>