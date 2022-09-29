<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">
</script>
<script>
	$(document).ready(function() {
		$('#example').DataTable({
			"aaSorting": [
				[0, 'desc']
			],
			"lengthMenu": [
				[20, 50, 100, -1],
				[20, 50, 100, "All"]
			]
		});
	});
</script>
<div class="container">
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?php echo base_url(); ?>Img/g.jpg" alt="First slide">
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col col-sm-12 col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #d6d4d0;">
				<!-- Brand/logo -->
				<a class="navbar-brand" href="<?= site_url(''); ?>">
					<img src="<?php echo base_url(); ?>/Img/LOGO.png" alt="logo" style="width:40px;">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?= site_url(''); ?>">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="<?= site_url('form/allcase'); ?>">ติดตามงาน</a>
						</li>

						<li class="nav-item active">
							<a class="nav-link" href="<?= site_url('login'); ?>">Login</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
<div class="container" style="margin-top: 10px">
	<div class="row">
		<div class="col col-sm-12 col-md-12">
			<h3>::ติดตามงาน::</h3>
			<!-- datatable : id example & class display -->
			<table id="example" class="table table-bordered table-striped table-hover  display">
				<thead style="background-color: #c8cfca;">
					<tr>
						<th style="width: 5%;">No.</th>
						<th style="width: 15%;">ประเภท</th>
						<th style="width: 40%;">รายละเอียด</th>
						<th style="width: 25%;">ผู้แจ้ง</th>
						<th style="width: 15%;">สถานะ</th>
						<th style="width: 5%;">view</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query as $rs) { ?>
						<tr>
							<td align="center"><?= $rs->id; ?></td>
							<td><?= $rs->case_type; ?></td>
							<td><?=
									'<b>' . $rs->case_detail . '</b>'
										. '<br>'
										. 'ว/ด/ป '
										. date('d/m/Y H:i:s', strtotime($rs->date_save))
										. ' น.'; ?></td>
							<td>
								<?=
								'<b> แจ้งโดย ' . $rs->p_name
									. '</b><br>'
									. 'เบอร์ติดต่อ : '
									. $rs->p_phone; ?></td>
							<td>
								<?php
								if ($rs->case_status == 1) {
									echo 'รอดำเนินการ';
								} elseif ($rs->case_status == 2) {
									echo 'กำลังดำเนินการ';
								} elseif ($rs->case_status == 3) {
									echo 'เสร็จสิ้น';
								} else {
									echo 'ยกเลิก';
								}
								?>
							</td>
							<td><a href="<?= site_url('form/detail/' . $rs->id); ?>" class="btn btn-info btn-sm" target="_blank"> view </a></td>
						</tr>
					<?php  } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
