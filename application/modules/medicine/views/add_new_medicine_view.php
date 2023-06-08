<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>
                <?php
                if (!empty($medicine->id))
                    echo lang('edit_medicine');
                else
                    echo lang('add_medicine');
                ?>
            </h1>
        </div>
        <?php
        $message = validation_errors();
        if (!empty($message)) {
        ?><div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <div class="alert-title">Failed!</div>
                    <?= $message; ?>
                </div>
            </div>
        <?php } ?>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="medicine/addNewMedicine" class="clearfix" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                        if (!empty($medicine->name)) {
                                            echo $medicine->name;
                                        }
                                    ?>' placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('category'); ?></label>
                                </div>
                                <div class="col-md-8">
                                            <select class="form-control m-bot15" name="category" value=''>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value="<?php echo $category->category; ?>" <?php
                                                    if (!empty($medicine->category)) {
                                                        if ($category->category == $medicine->category) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo $category->category; ?> </option>
                                                <?php } ?> 
                                            </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('p_price'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="price" id="exampleInputEmail1" value='<?php
                                            if (!empty($medicine->price)) {
                                                echo $medicine->price;
                                            }
                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('s_price'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="s_price" id="exampleInputEmail1" value='<?php
                                            if (!empty($medicine->s_price)) {
                                                echo $medicine->s_price;
                                            }
                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('store_box'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="box" id="exampleInputEmail1" value='<?php
                                            if (!empty($medicine->box)) {
                                                echo $medicine->box;
                                            }
                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('quantity'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="quantity" id="exampleInputEmail1" value='<?php
                                            if (!empty($medicine->quantity)) {
                                                echo $medicine->quantity;
                                            }
                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('generic_name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="generic" id="exampleInputEmail1" value='<?php
                                            if (!empty($medicine->generic)) {
                                                echo $medicine->generic;
                                            }
                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('company'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="company" id="exampleInputEmail1" value='<?php
                                            if (!empty($medicine->company)) {
                                                echo $medicine->company;
                                            }
                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('effects'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="effects" id="exampleInputEmail1" value='<?php
                                            if (!empty($medicine->effects)) {
                                                echo $medicine->effects;
                                            }
                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('expiry_date'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" name="e_date" id="exampleInputEmail1" value='<?php
                                            if (!empty($medicine->e_date)) {
                                                echo $medicine->e_date;
                                            }
                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        

                        <input type="hidden" name="id" value='<?php
                            if (!empty($medicine->id)) {
                                echo $medicine->id;
                            }
                        ?>'>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right"></div>
                                <div class="col-md-8">
                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--main content end-->
<!--footer start-->


<style>
    .wrapper{
        padding: 24px 30px;
    }
</style>
