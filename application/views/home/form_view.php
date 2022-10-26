<style>
.img_upload {
    left: 5px;
    max-width: 350px;
    border: 1px solid black;
}

.close {
    position: absolute;
    right: 25px;
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
                            <a class="nav-link text-success" href="<?= site_url(''); ?>">Home <span
                                    class="sr-only">(current)</span></a>
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
<div class="container" style="margin-top: 50px">
    <form action="<?= site_url('form/adding'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>ชื่อผู้แจ้ง <span class="text-danger">*</span></label>
                <input type="text" name="p_name" class="form-control" required minlength="3"
                    placeholder="*ต้องการข้อมูล" value="<?= set_value('p_name'); ?>">
                <span class="fr"><?= form_error('p_name'); ?></span>
            </div>
            <div class="form-group col-md-3">
                <label>นามสกุลผู้แจ้ง <span class="text-danger">*</span></label>
                <input type="text" name="p_lastname" class="form-control" required minlength="3"
                    placeholder="*ต้องการข้อมูล" value="<?= set_value('p_lastname'); ?>">
                <span class="fr"><?= form_error('p_lastname'); ?></span>
            </div>
            <div class="form-group col-md-3">
                <label>เบอร์ผู้แจ้ง <span class="text-danger">*</span></label>
                <!-- <input type="email" name="p_phone" class="form-control" required placeholder="*ต้องการข้อมูล"value="<?= set_value('p_phone'); ?>"> -->
                <input type="tel" name="p_phone" class="form-control" placeholder="012-345-6789"
                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?= set_value('p_phone'); ?>" required>
                <span class="fr"><?= form_error('p_phone'); ?></span>
            </div>
            <div class="form-group col-md-3">
                <label>ประเภทปัญหา <span class="text-danger">*</span></label>
                <select name="case_type" class="form-control" required>
                    <?php if (set_value('case_type') != '') { ?>
                    <option value="<?= set_value('case_type'); ?>"><?= set_value('case_type'); ?></option>
                    <?php } else {
						echo '<option value="">Choose...</option>';
					}
					?>

                    <option value="ดูดล้างท่อ">-ดูดล้างท่อ-</option>
                    <option value="ฝาท่อชำรุด">-ฝาท่อชำรุด-</option>
                    <option value="ขออนุญาตเชื่อมท่อระบายน้ำ">-ขออนุญาตเชื่อมท่อระบายน้ำ-</option>
                    <option value="ขุดลอกลำรางระบายน้ำ">-ขุดลอกลำรางระบายน้ำ-</option>
                    <option value="อื่นๆ">-อื่นๆ-</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>ถนน <span class="text-danger">*</span></label>
                <select name="road_name" class="form-control" required>
                    <option value="">Choose...</option>
                    <?php foreach ($road as $r) { ?>
                        <option value="<?=$r->road_name ?>" <?= set_value('case_type') == $r->road_name ? "selected" : "" ?>>-<?=$r->road_name ?>-</option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>ชุมชน <span class="text-danger">*</span></label>
                <select name="cmu_name" class="form-control" required>
                    <option value="">Choose...</option>
                    <?php foreach ($cmu as $c) { ?>
                        <option value="<?=$c->cmu_name ?>" <?= set_value('case_type') == $c->cmu_name ? "selected" : "" ?>>-<?=$c->cmu_name ?>-</option>
                    <?php } ?>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>รายละเอียดสถานที่ <span class="text-danger">*</span></label>
                <textarea name="case_loc" class="form-control" required minlength="5"
                    placeholder="*ระบุตึก ชั้น ห้อง สถานที่ให้ครบถ้วน"><?= set_value('case_loc'); ?></textarea>
                <span class="fr"><?= form_error('case_loc'); ?></span>
            </div>
            <div class="form-group col-md-6">
                <label>รายละเอียดปัญหา <span class="text-danger">*</span></label>
                <textarea name="case_detail" class="form-control" required minlength="5"
                    placeholder="*ต้องการข้อมูล"><?= set_value('case_detail'); ?></textarea>
                <span class="fr"><?= form_error('case_detail'); ?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label id="n_img_case">ภาพประกอบ <span class="text-danger">*</span></label>
                <div>
                    <button type="button" id="up_img" class="btn btn-info form-control col-md-1"><i class="fa fa-plus"
                            aria-hidden="true"></i></button>
                    <input type="file" id="upload_img" name="image" class="form-control" accept="image/*" multiple
                        required hidden>
                    <span class="fr"><?= $error; ?></span>
                </div>
            </div>
        </div>

        <div class="form-row img_case">

        </div>
        <div class="submit_case" style="display: grid;place-items: center;">
            <button type="submit" class="btn btn-primary" style="width: 20%">แจ้งซ่อม</button>
        </div>
    </form>
</div>


<script type="text/javascript">
var count_img = 0;

$('#up_img').click(function(event) {
    $('#upload_img').click();
});

$(document).on("click", ".close", function(event) {
    $(this).closest('.form-group').remove();
    $("#n_img_case").html("ภาพประกอบช่าง (" + (--count_img) + " ภาพ)");
});

$("[name=image]").change(function(event) {
    $.each($(this)[0].files, function(i, file) {
        var fd = new FormData();
        var files = file;
        fd.append('file', files);

        $.ajax({
            url: 'Form/testUpload',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    var ele = '<div class="form-group col-md-4">';
                    ele += '<img class="img_upload" src="Img/' + response +
                        '" alt="" width="500" height="250">';
                    ele +=
                        '<button type="button" class="close" aria-label="Close" style="color:red">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>';
                    ele += '<input hidden name="img_upload_new[]" value="' + response +
                    '">';
                    ele += '</div>';
                    $(".img_case").append(ele);
                    $("#n_img_case").html("ภาพประกอบช่าง (" + (++count_img) + " ภาพ)");
                } else {
                    alert('file not uploaded');
                }
            },
        });
    });
});
</script>