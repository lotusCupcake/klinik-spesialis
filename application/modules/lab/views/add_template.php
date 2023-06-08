<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php
                if (!empty($template->id))
                    echo lang('edit_lab_report') . ' ' . lang('template');
                else
                    echo lang('add_lab_report') . ' ' . lang('template');
                ?>
            </h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form role="form" id="editLabForm" action="lab/addTemplate" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label for="exampleInputEmail1"> <?php echo lang('template'); ?> <?php echo lang('name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control pay_in" name="name" value='<?php
                                                                                                        if (!empty($template->name)) {
                                                                                                            echo $template->name;
                                                                                                        }
                                                                                                        ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label for="exampleInputEmail1"> <?php echo lang('template'); ?> </label>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control ckeditor" name="template" value="" rows="70" cols="70">
                                        <?php
                                        if (!empty($setval)) {
                                            echo set_value('template');
                                        }
                                        if (!empty($template->template)) {
                                            echo $template->template;
                                        }
                                        ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value='<?php
                                                                if (!empty($template->id)) {
                                                                    echo $template->id;
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