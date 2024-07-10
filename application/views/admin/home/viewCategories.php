<div class="content-wrapper">
    <div class="row padtop">
        <div class="col-md-10 col-md-offset-1">
            <?php if($this->session->flashdata('class')):?>
            <div class="alert <?php echo $this->session->flashdata('class')?> alert-dismissible" role="alert">
                <?php echo $this->session->flashdata('message');?>
            </div>
            <?php endif; ?>
            <h2>List of Products</h2>
            <?php if($viewCategories): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>CPU</th>
                            <th>Ram</th>
                            <th>Cooler</th>
                            <th>Fans</th>
                            <th>Case</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($viewCategories as $category): ?>
                        <tr>
                            <td><?php echo $category->categoryID ?></td>
                            <td><?php echo $category->categoryName ?></td>
                            <td><?php echo $category->categoryCPU ?></td>
                            <td><?php echo $category->categoryRam ?></td>
                            <td><?php echo $category->categoryCooler ?></td>
                            <td><?php echo $category->categoryFans ?></td>
                            <td><?php echo $category->categoryCase ?></td>
                            <td>
                                <?php if($category->categoryDp): ?>
                                <img src="<?php echo base_url('assets/images/categories/'.$category->categoryDp) ?>" class="img-thumbnail" width="100" height="auto">
                                <?php else: ?>
                                No Image Available
                                <?php endif; ?>
                            </td>
                            <td><a href="<?php echo site_url('admin/editCategory/'.$category->categoryID) ?>" class="btn btn-info">EDIT</a></td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-danger delcat" data-id="<?php echo $category->categoryID;?>" data-text="<?php echo $this->encryption->encrypt($category->categoryID) ?>">DELETE</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php echo $links; ?>
            <?php else: ?>
            <p>Categories are not available at this time.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
