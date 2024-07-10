<div class="content-wrapper">
    <div class="row padtop">
    <?php if($this->session->flashdata('class')):?>
              <div class="alert <?php echo $this->session->flashdata('class')?> alert-dismissible" role="alert">
                <?php echo $this->session->flashdata('message');?>
              </div> 
    <?php endif; ?>
        <div class="col-md-6 col-md-offset-3">
            <h2>ADD NEW PRODUCT</h2>
            <?php echo form_open_multipart('admin/addCategory', '', '') ?>
                <div class="form-group">
                <?php echo form_input('categoryName', '', 'class="form-control" id="categoryName" placeholder="Enter category name"'); ?>
                </div>
                <div class="form-group">
                <?php echo form_input('categoryCPU', '', 'class="form-control" id="categoryCPU" placeholder="Enter CPU name"'); ?>
                </div>
                <div class="form-group">
                <?php echo form_input('categoryRam', '', 'class="form-control" id="categoryRam" placeholder="Enter RAM name"'); ?>
                </div>
                <div class="form-group">
                <?php echo form_input('categoryCooler', '', 'class="form-control" id="categoryCooler" placeholder="Enter cooler name"'); ?>
                </div>
                <div class="form-group">
                <?php echo form_input('categoryFans', '', 'class="form-control" id="categoryFans" placeholder="Enter fan name"'); ?>
                </div>
                <div class="form-group">
                <?php echo form_input('categoryCase', '', 'class="form-control" id="categoryCase" placeholder="Enter case name"'); ?>
                </div>
                <div class="form-group">
                    <?php echo form_upload('categoryDp', '', ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_submit('Add Category', 'Add Category', 'class="btn btn-primary"'); ?>
                </div> 
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
