<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php
                if (!empty($category->id))
                    echo lang('edit_expense_category');
                else
                    echo lang('add_expense_category');
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
                    <form role="form" action="finance/addExpenseCategory" method="post" enctype="multipart/form-data">
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
                                    <label class="col-form-label"><?php echo lang('description'); ?> <?php echo lang('rate'); ?> (%)</label>
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