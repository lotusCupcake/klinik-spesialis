<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>
                <?php
                if (!empty($gridsection->id))
                    echo '<i class="fa fa-edit"></i> ' . lang('edit_gridsection');
                else
                    echo '<i class="fa fa-plus-circle"></i> ' . lang('add_gridsection');
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
                    <form role="form" action="gridsection/addNew" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('title'); ?></label>
                                </div>
                                <div class="col-md-8">
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='<?php
                                                                                                                if (!empty($setval)) {
                                                                                                                    echo set_value('name');
                                                                                                                }
                                                                                                                if (!empty($gridsection->title)) {
                                                                                                                    echo $gridsection->title;
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
                                    <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='<?php
                                                                                                                    if (!empty($setval)) {
                                                                                                                        echo set_value('category');
                                                                                                                    }
                                                                                                                    if (!empty($gridsection->category)) {
                                                                                                                        echo $gridsection->category;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('description'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='<?php
                                                                                                                        if (!empty($setval)) {
                                                                                                                            echo set_value('gridsection');
                                                                                                                        }
                                                                                                                        if (!empty($gridsection->description)) {
                                                                                                                            echo $gridsection->description;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('position'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="position" id="exampleInputEmail1" value='<?php
                                                                                                                    if (!empty($setval)) {
                                                                                                                        echo set_value('gridsection');
                                                                                                                    }
                                                                                                                    if (!empty($gridsection->position)) {
                                                                                                                        echo $gridsection->position;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('status'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control m-bot15" name="status" value=''>
                                        <option value="Active" <?php
                                                                if (!empty($setval)) {
                                                                    if ($gridsection->status == set_value('status')) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($gridsection->status)) {
                                                                    if ($gridsection->status == 'Active') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>> <?php echo lang('active'); ?>
                                        </option>
                                        <option value="Inactive" <?php
                                                                    if (!empty($setval)) {
                                                                        if ($gridsection->status == set_value('status')) {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    if (!empty($gridsection->status)) {
                                                                        if ($gridsection->status == 'Inactive') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>> <?php echo lang('in_active'); ?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('image') ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" name="img_url">
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="id" value='<?php
                                                                if (!empty($gridsection->id)) {
                                                                    echo $gridsection->id;
                                                                }
                                                                ?>'>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                </div>
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