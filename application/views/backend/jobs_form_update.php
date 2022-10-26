<style>
.img_upload {
    left: 5px;
    max-width: 350px;
    border: 1px solid black;
}

.close {
    position: absolute;
    right: 5px;
    top: 10px;
}

.box-body label {
    margin-top: 20px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มอัพเดทงานซ่อม
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Your Page Content Here -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title"> +ข่าวใหม่ </h3> -->
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="<?= site_url('jobs/updatedata'); ?>" method="post"
                            class="form-horizontal" enctype="multipart/form-data">

                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="col-sm-3">
                                        <label>JobNo.</label>
                                        <input type="number" name="id" class="form-control" readonly
                                            value="<?= $query->id;?>">
                                        <span class="fr"><?= form_error('id'); ?></span>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>ประเภทการแจ้ง</label>
                                        <select class="form-control" disabled>
                                            <option value="<?= $query->case_type;?>"><?= $query->case_type;?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>ผู้แจ้ง</label>
                                        <input type="text" class="form-control" disabled value="<?= $query->p_name;?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>เบอร์ผู้แจ้ง</label>
                                        <input type="text" class="form-control" disabled value="<?= $query->p_phone;?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-sm-6">
                                        <label>ถนน</label>
                                        <input type="text" class="form-control" disabled value="<?= $query->road_name;?>">
                                    </div> 
                                    <div class="col-sm-6">
                                        <label>ชุมชน</label>
                                        <input type="text" class="form-control" disabled value="<?= $query->cmu_name;?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-sm-6">
                                        <label>รายละเอียดสถานที่</label>
                                        <textarea class="form-control" disabled><?= $query->case_loc;?></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>รายละเอียด</label>
                                        <textarea class="form-control" disabled><?= $query->case_detail;?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-sm-12">
                                        <label>ภาพประกอบ (<?=count($img_detail)?> ภาพ)</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <?php foreach ($img_detail as $img) { ?>
                                    <div class="col-sm-4">
                                        <img style="border: 1px solid black; margin: 5px;" width="350" height="250"
                                            src="<?= base_url() . 'Img/' . $img->p_img ?>">
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-sm-4">
                                        <label>ผู้บันทึก</label>
                                        <input type="text" class="form-control" readonly name="tech_name"
                                            value="<?= $_SESSION['admin_name'];?>">
                                        <input type="hidden" class="form-control" name="tech_id"
                                            value="<?= $_SESSION['id'];?>">
                                        <span class="fr"><?= form_error('admin_name'); ?></span>
                                        <span class="fr"><?= form_error('tech_id'); ?></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>สถานะล่าสุด
                                            <span class="fr">*</span>
                                            <span class="fr"><?= form_error('case_status'); ?></span>
                                        </label>
                                        <select name="case_status" required class="form-control"
                                            <?=($query->case_status==3 ? "disabled" : "") ?>>
                                            <option value="">
                                                <?php
                                                            if($query->case_status==1){
                                                            echo 'รอดำเนินการ';
                                                            }elseif($query->case_status==2){
                                                            echo 'กำลังดำเนินการ';
                                                            }elseif($query->case_status==3){
                                                            echo 'เสร็จสิ้น';
                                                            }else{
                                                            echo 'ยกเลิก';
                                                            }
                                                            ?>
                                            </option>
                                            <option value="">--เปลี่ยน---</option>
                                            <option value="1">-รอดำเนินการ</option>
                                            <option value="2">-กำลังดำเนินการ</option>
                                            <option value="3">-เสร็จสิ้น</option>
                                            <option value="4">-ยกเลิก</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>ว/ด/ป (ล่าสุด)</label>
                                        <input type="text" class="form-control" value="<?= $query->case_update; ?>"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-sm-12">
                                        <label>บันทึกการอัพเดทงานซ่อม<span class="fr">*</span></label>
                                        <textarea name="case_update_log" placeholder="*ต้องการข้อมูล"
                                            class="form-control" required
                                            <?=($query->case_status==3 ? "disabled" : "") ?>><?= $query->case_update_log;?></textarea>
                                        <span class="fr"><?= form_error('case_update_log'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-sm-12">
                                        <label id="n_img_emp">ภาพประกอบช่าง (<?=count($img_detail_emp)?> ภาพ)</label>
                                        <div>
                                            <button type="button" id="up_img" class="btn btn-info" <?=($query->case_status==3 ? "style='display:none'" : "")  ?>><i class="fa fa-plus"
                                                    aria-hidden="true"></i></button>
                                            <input type="file" id="upload_img" name="image" class="form-control"
                                                accept="image/*" multiple style="display:none">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 img_emp">
                                    <?php foreach ($img_detail_emp as $img) { ?>
                                    <div class="col-sm-4">
                                        <img style="border: 1px solid black; margin: 5px;" width="350" height="250"
                                            src="<?= base_url() . 'Img/' . $img->p_img ?>">
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="col-md-12" style="margin-top: 20px" <?=($query->case_status==3 ? "hidden" : "")  ?>>
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                        <a class="btn btn-danger" href="<?=  site_url('jobs'); ?>" role="button"><i
                                                class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                    </div>
                                </div>
                            </div>



                            <!-- <div class="box-body">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3 control-label">
                                            JobNo.
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="number" name="id" class="form-control" readonly
                                                value="<?= $query->id;?>">
                                            <span class="fr"><?= form_error('id'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-3 control-label">
                                            ประเภทการแจ้ง
                                        </div>
                                        <div class="col-sm-7">
                                            <select class="form-control" disabled>
                                                <option value="<?= $query->case_type;?>"><?= $query->case_type;?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3 control-label">
                                            รายละเอียด
                                        </div>
                                        <div class="col-sm-8">
                                            <textarea class="form-control"
                                                disabled><?= $query->case_detail;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3 control-label">
                                            สถานที่
                                        </div>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" disabled><?= $query->case_loc;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3 control-label">
                                            ผู้แจ้ง
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" disabled
                                                value="<?= $query->p_name;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3 control-label">
                                            เบอร์ผู้แจ้ง
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" disabled
                                                value="<?= $query->p_phone;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            ภาพประกอบ
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <?php foreach ($img_detail as $img) { ?>
                                                <div class="col-sm-4">
                                                    <img style="border: 1px solid black; margin: 5px;" width="200"
                                                        height="150" src="<?= base_url() . 'Img/' . $img->p_img ?>">
                                                </div>
                                                <?php } ?>
                                            </div>
                                            ว/ด/ป : <?= $query->date_save;?>
                                        </div>
                                    </div>

                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            สถานะล่าสุด <span class="fr">*</span>
                                            <span class="fr"><?= form_error('case_status'); ?></span>
                                            <select name="case_status" required class="form-control"
                                                <?=($query->case_status==3 ? "disabled" : "") ?>>
                                                <option value="">
                                                    <?php
                                                            if($query->case_status==1){
                                                            echo 'รอดำเนินการ';
                                                            }elseif($query->case_status==2){
                                                            echo 'กำลังดำเนินการ';
                                                            }elseif($query->case_status==3){
                                                            echo 'เสร็จสิ้น';
                                                            }else{
                                                            echo 'ยกเลิก';
                                                            }
                                                            ?>
                                                </option>
                                                <option value="">--เปลี่ยน---</option>
                                                <option value="1">-รอดำเนินการ</option>
                                                <option value="2">-กำลังดำเนินการ</option>
                                                <option value="3">-เสร็จสิ้น</option>
                                                <option value="4">-ยกเลิก</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            ว/ด/ป (ล่าสุด)
                                            <input type="text" class="form-control" value="<?= $query->case_update; ?>"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-7">
                                            บันทึกการอัพเดทงานซ่อม<span class="fr">*</span>
                                            <textarea name="case_update_log" placeholder="*ต้องการข้อมูล"
                                                class="form-control" required
                                                <?=($query->case_status==3 ? "disabled" : "") ?>><?= $query->case_update_log;?></textarea>
                                            <span class="fr"><?= form_error('case_update_log'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            ผู้บันทึก
                                            <input type="text" class="form-control" readonly name="tech_name"
                                                value="<?= $_SESSION['admin_name'];?>">
                                            <input type="hidden" class="form-control" name="tech_id"
                                                value="<?= $_SESSION['id'];?>">
                                            <span class="fr"><?= form_error('admin_name'); ?></span>
                                            <span class="fr"><?= form_error('tech_id'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            ภาพประกอบช่าง:
                                            <div>
                                                <button type="button" id="up_img" class="btn btn-info"><i
                                                        class="fa fa-plus" aria-hidden="true"></i></button>
                                                <input type="file" id="upload_img" name="image" class="form-control"
                                                    accept="image/*" multiple required style="display:none">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="row img_emp">
                                                <?php foreach ($img_detail_emp as $img) { ?>
                                                <div class="col-sm-6">
                                                    <img style="border: 1px solid black; margin: 5px;" width="500"
                                                        height="250" src="<?= base_url() . 'Img/' . $img->p_img ?>">
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?=(count($img_detail_emp) == 0 ? "" : "ว/ด/ป : " . $query->case_update) ?>
                                        </div>
                                    </div>

                                    <div class="form-group" <?=($query->case_status==3 ? "hidden" : "")  ?>>
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="<?=  site_url('jobs'); ?>" role="button"><i
                                                    class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                        </div>
                                    </div>
                                </div>
                            </div>/.box-body -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">

var count_img = <?=count($img_detail_emp)?>;

$('#up_img').click(function(event) {
    $('#upload_img').click();
});

$(document).on("click", ".close", function(event) { 
    $(this).closest('.col-sm-4').remove();
    $("#n_img_emp").html("ภาพประกอบช่าง (" + --count_img + " ภาพ)");
});

$("[name=image]").change(function(event) {
    $.each($(this)[0].files, function(i, file) {
        var fd = new FormData();
        var files = file;
        fd.append('file', files);

        $.ajax({
            url: '<?=base_url();?>Form/testUpload',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    var ele = '<div class="col-sm-4">';
                    ele += '<img class="img_upload" src="<?=base_url()?>Img/' + response +
                        '" alt="" style="border: 1px solid black; margin: 5px;" width="350" height="250">';
                    ele +=
                        '<button type="button" class="close" aria-label="Close" style="color:red">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>';
                    ele += '<input hidden name="img_upload_new[]" value="' + response +
                        '">';
                    ele += '</div>';
                    $(".img_emp").append(ele);
                    $("#n_img_emp").html("ภาพประกอบช่าง (" + (++count_img) + " ภาพ)");
                } else {
                    alert('file not uploaded');
                }
            },
        });
    });
});
</script>