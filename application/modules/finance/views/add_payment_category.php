<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php
                if (!empty($category->id))
                    echo lang('edit_payment_category');
                else
                    echo lang('create_payment_procedure');
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
                    <form role="form" action="finance/addPaymentCategory" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('category'); ?> <?php echo lang('name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='<?php
                                                                                                                            if (!empty($setval)) {
                                                                                                                                echo set_value('category');
                                                                                                                            }
                                                                                                                            if (!empty($category->category)) {
                                                                                                                                echo $category->category;
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
                                                                                                                                    echo set_value('description');
                                                                                                                                }
                                                                                                                                if (!empty($category->description)) {
                                                                                                                                    echo $category->description;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('doctors_commission'); ?> <?php echo lang('rate'); ?> (%)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="d_commission" id="exampleInputEmail1" value='<?php
                                                                                                                                if (!empty($setval)) {
                                                                                                                                    echo set_value('d_commission');
                                                                                                                                }
                                                                                                                                if (!empty($category->d_commission)) {
                                                                                                                                    echo $category->d_commission;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('address'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                                                                                                            if (!empty($setval)) {
                                                                                                                                echo set_value('address');
                                                                                                                            }
                                                                                                                            if (!empty($patient->address)) {
                                                                                                                                echo $patient->address;
                                                                                                                            }
                                                                                                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('type'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="type">
                                        <option value="diagnostic" <?php
                                                                    if (!empty($setval)) {
                                                                        if (set_value('type') == 'diagnostic') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    if (!empty($category->type)) {
                                                                        if ($category->type == 'diagnostic') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>> <?php echo lang('diagnostic_test'); ?> </option>
                                        <option value="others" <?php
                                                                if (!empty($setval)) {
                                                                    if (set_value('type') == 'others') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($category->type)) {
                                                                    if ($category->type == 'others') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>> <?php echo lang('others'); ?> </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value='<?php
                                                                if (!empty($category->id)) {
                                                                    echo $category->id;
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
    </section>
</div>