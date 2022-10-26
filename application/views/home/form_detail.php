<style>
.img_upload {
    left: 5px;
    max-width: 350px;
    border: 1px solid black;
}

</style>
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
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= site_url(''); ?>">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <a class="nav-link" href="<?= site_url('form/allcase'); ?>">ติดตามงาน</a>

                        <li class="nav-item active">
                            <a class="nav-link" href="<?= site_url('login'); ?>">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 50px">
    <form>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label>CaseID</label>
                <input type="number" name="id" class="form-control" value="<?= $rs_detail->id; ?>" disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label>Status</label>
                <?php
						$st = $rs_detail->case_status;
						if ($st == 1) {
							$stMsg = 'รอดำเนินการ';
						} elseif ($st == 2) {
							$stMsg = 'อยู่ระหว่างดำเนินการ';
						} elseif ($st == 3) {
							$stMsg = 'ดำเนินการเสร็จสิ้น';
						} elseif ($st == 4) {
							$stMsg = 'ส่งซ่อมภายนอก';
						} else {
							$stMsg = 'ยกเลิก';
						}
						?>
                <input type="text" style="color:red;" class="form-control" value="<?= $stMsg; ?>" disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label>ช่างที่รับผิดชอบ</label>
                <input type="text" class="form-control" readonly name="tech_name" value="<?= $rs_detail->tech_name; ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label>ว/ด/ป (ล่าสุด)</label>
                <input type="text" class="form-control" readonly name="date_save" value="<?= $rs_detail->date_save; ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>ประเภทปัญหา</label>
                <select name="case_type" class="form-control" disabled>
                    <option value="<?= $rs_detail->case_type; ?>"><?= $rs_detail->case_type; ?></option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>ชื่อผู้แจ้ง</label>
                <input type="text" name="p_name" class="form-control" disabled value="<?= $rs_detail->p_name; ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label>เบอร์ผู้แจ้ง</label>
                <input type="email" name="p_phone" class="form-control" disabled value="<?= $rs_detail->p_phone; ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>ถนน</label>
                <input type="text" name="road_name" class="form-control" disabled value="<?= $rs_detail->road_name; ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label>ชุมชน</label>
                <input type="text" name="cmu_name" class="form-control" disabled value="<?= $rs_detail->cmu_name; ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>รายละเอียดสถานที่</label>
                <textarea name="case_loc" class="form-control" disabled><?= $rs_detail->case_loc; ?></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label>รายละเอียดปัญหา</label>
                <textarea name="case_detail" class="form-control" disabled><?= $rs_detail->case_detail; ?></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label>หมายเหตุ</label>
                <textarea name="case_update_log" class="form-control"
                    disabled><?= $rs_detail->case_update_log; ?></textarea>
            </div>
        </div>
        <label>ภาพประกอบ (<?=count($img_detail) ?> ภาพ)</label>
        <div class="form-row img_case">
            <?php foreach ($img_detail as $img) { ?>
            <div class="form-group col-md-4">
                <img class="img_upload border border-dark" src="<?= base_url() . 'Img/' . $img->p_img ?>" alt=""
                    width="500" height="250">
            </div>
            <?php } ?>
        </div>
		<label>ภาพประกอบของช่าง (<?=count($img_detail_emp) ?> ภาพ)</label>
        <div class="form-row img_case">
            <?php foreach ($img_detail_emp as $img) { ?>
            <div class="form-group col-md-4">
                <img class="img_upload border border-dark" src="<?= base_url() . 'Img/' . $img->p_img ?>" alt=""
                    width="500" height="250">
            </div>
            <?php } ?>
        </div>
		<div class="u_turn" style="display: grid;place-items: center;">
			<a href="<?= site_url(''); ?>" class="btn btn-primary">กลับหน้าหลัก</a>
        </div>
    </form>

</div>