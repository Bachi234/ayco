<div class="content-wrapper">
    <div class="row padtop">
        <?php if($this->session->flashdata('class')):?>
        <div class="alert <?php echo $this->session->flashdata('class')?> alert-dismissible" role="alert">
            <?php echo $this->session->flashdata('message');?>
        </div> 
        <?php endif; ?>
        <div class="col-md-6 col-md-offset-1">
            <h2>EDIT CATEGORY</h2>
            <?php echo form_open_multipart('admin/updateCategory', '', '') ?>
            <input name="xid" type="hidden" value="<?php echo $category[0]['categoryID'] ?>">
            <input name="xImage" type="hidden" value="<?php echo $category[0]['categoryDp'] ?>">
            <div class="form-group">
                <?php echo form_input('categoryName', $category[0]['categoryName'], 'class="form-control"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_input('categoryCPU', $category[0]['categoryCPU'], 'class="form-control"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_input('categoryRam', $category[0]['categoryRam'], 'class="form-control"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_input('categoryCooler', $category[0]['categoryCooler'], 'class="form-control"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_input('categoryFans', $category[0]['categoryFans'], 'class="form-control"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_input('categoryCase', $category[0]['categoryCase'], 'class="form-control"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_upload('categoryDp', '', ''); ?>
            </div>
            <div class="form-group">
                <?php echo form_submit('Update Category', 'Update Category', 'class="btn btn-primary"'); ?>
            </div> 
            <?php echo form_close(); ?>
        </div>
        <div class="col-md-3">
            <img src="<?php echo base_url('assets/images/categories/'.$category[0]['categoryDp']) ?>" class="img-responsive" style="max-width: 300px; height: auto;">
        </div>
    </div>
</div>
