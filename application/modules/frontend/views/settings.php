<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('website'); ?> <?php echo lang('settings'); ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="general-tab4" data-toggle="tab" href="#general4" role="tab" aria-controls="general" aria-selected="true">General Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="block-tab4" data-toggle="tab" href="#block4" role="tab" aria-controls="block" aria-selected="false">Block Text Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="appointment-tab4" data-toggle="tab" href="#appointment4" role="tab" aria-controls="appointment" aria-selected="false">Appointment Button Block Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="social-tab4" data-toggle="tab" href="#social4" role="tab" aria-controls="social" aria-selected="false">Social Settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <form role="form" action="frontend/update" method="post" enctype="multipart/form-data">
                                <div class="tab-content no-padding" id="myTab2Content">
                                    <div class="tab-pane fade show active" id="general4" role="tabpanel" aria-labelledby="general-tab4">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label"><?php echo lang('title'); ?></label>
                                                <input type="text" name="title" class="form-control" <?php
                                                                                                        if (!empty($settings->title)) {
                                                                                                            echo $settings->title;
                                                                                                        }
                                                                                                        ?>' placeholder="system name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                                                <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                                                                                                                        if (!empty($settings->address)) {
                                                                                                                                            echo $settings->address;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="address">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('hospital_email'); ?></label>
                                                <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($settings->email)) {
                                                                                                                                        echo $settings->email;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($settings->phone)) {
                                                                                                                                        echo $settings->phone;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="phone">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('currency'); ?></label>
                                                <input type="text" class="form-control" name="currency" id="exampleInputEmail1" value='<?php
                                                                                                                                        if (!empty($settings->currency)) {
                                                                                                                                            echo $settings->currency;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="currency">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('emergency'); ?></label>
                                                <input type="text" class="form-control" name="emergency" id="exampleInputEmail1" value='<?php
                                                                                                                                        if (!empty($settings->emergency)) {
                                                                                                                                            echo $settings->emergency;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Image Upload</label>
                                                <div class="">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="height:200px">
                                                            <img src="<?php if (empty($settings->logo)) {
                                                                            echo base_url() . '/template/assets/img/news/img01.jpg';
                                                                        } else {
                                                                            echo $settings->logo;
                                                                        } ?>" id="img" alt="" />
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-height: 200px; line-height: 20px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <button type="button" class="btn btn-left btn-light fileupload-new"><i class="fa fa-paper-clip"></i> Select image</button>
                                                                <button type="button" class="btn btn-left btn-light fileupload-exists"><i class="fa fa-undo"></i> Change</button>
                                                                <input type="file" class="default" name="img_url" />
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('support_number'); ?></label>
                                                <input type="text" class="form-control" name="support" id="exampleInputEmail1" value='<?php
                                                                                                                                        if (!empty($settings->support)) {
                                                                                                                                            echo $settings->support;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="block4" role="tabpanel" aria-labelledby="block-tab4">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('footer') . " " . lang('description'); ?></label>
                                                <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='<?php
                                                                                                                                            if (!empty($settings->description)) {
                                                                                                                                                echo $settings->description;
                                                                                                                                            }
                                                                                                                                            ?>' placeholder="Footer Description">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('block_1_text_under_title'); ?></label>
                                                <input type="text" class="form-control" name="block_1_text_under_title" id="exampleInputEmail1" value='<?php
                                                                                                                                                        if (!empty($settings->block_1_text_under_title)) {
                                                                                                                                                            echo $settings->block_1_text_under_title;
                                                                                                                                                        }
                                                                                                                                                        ?>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('service_block__text_under_title'); ?></label>
                                                <input type="text" class="form-control" name="service_block__text_under_title" id="exampleInputEmail1" value='<?php
                                                                                                                                                                if (!empty($settings->service_block__text_under_title)) {
                                                                                                                                                                    echo $settings->service_block__text_under_title;
                                                                                                                                                                }
                                                                                                                                                                ?>' placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('doctor_block__text_under_title'); ?></label>
                                                <input type="text" class="form-control" name="doctor_block__text_under_title" id="exampleInputEmail1" value='<?php
                                                                                                                                                                if (!empty($settings->doctor_block__text_under_title)) {
                                                                                                                                                                    echo $settings->doctor_block__text_under_title;
                                                                                                                                                                }
                                                                                                                                                                ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="appointment4" role="tabpanel" aria-labelledby="appointment-tab4">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('apppointment_block_title'); ?></label>
                                                <input type="text" class="form-control" name="appointment_title" id="exampleInputEmail1" value='<?php
                                                                                                                                                if (!empty($settings->appointment_title)) {
                                                                                                                                                    echo $settings->appointment_title;
                                                                                                                                                }
                                                                                                                                                ?>' placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('apppointment_block_subtitle'); ?></label>
                                                <input type="text" class="form-control" name="appointment_subtitle" id="exampleInputEmail1" value='<?php
                                                                                                                                                    if (!empty($settings->appointment_subtitle)) {
                                                                                                                                                        echo $settings->appointment_subtitle;
                                                                                                                                                    }
                                                                                                                                                    ?>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label"><?php echo lang('apppointment_block_image'); ?></label>
                                                <div class="">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="height: 200px">
                                                            <img src="<?php if (empty($settings->appointment_img_url)) {
                                                                            echo base_url() . '/template/assets/img/news/img01.jpg';
                                                                        } else {
                                                                            echo $settings->appointment_img_url;
                                                                        } ?>" id="img" alt="" style="height: 200px">
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-height: 200px; line-height: 20px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <button type="button" class="btn btn-left btn-light fileupload-new"><i class="fa fa-paper-clip"></i> Select image</button>
                                                                <button type="button" class="btn btn-left btn-light fileupload-exists"><i class="fa fa-undo"></i> Change</button>
                                                                <input type="file" class="default" name="appointment_img_url" />
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('apppointment_block_description'); ?></label>
                                                <input type="text" class="form-control" name="appointment_description" id="exampleInputEmail1" value='<?php
                                                                                                                                                        if (!empty($settings->appointment_description)) {
                                                                                                                                                            echo $settings->appointment_description;
                                                                                                                                                        }
                                                                                                                                                        ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="social4" role="tabpanel" aria-labelledby="social-tab4">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('facebook_id'); ?></label>
                                                <input type="text" class="form-control" name="facebook_id" id="exampleInputEmail1" value='<?php
                                                                                                                                            if (!empty($settings->facebook_id)) {
                                                                                                                                                echo $settings->facebook_id;
                                                                                                                                            }
                                                                                                                                            ?>' placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('twitter_id'); ?></label>
                                                <input type="text" class="form-control" name="twitter_id" id="exampleInputEmail1" value='<?php
                                                                                                                                            if (!empty($settings->twitter_id)) {
                                                                                                                                                echo $settings->twitter_id;
                                                                                                                                            }
                                                                                                                                            ?>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('twitter_username'); ?></label>
                                                <input type="text" class="form-control" name="twitter_username" id="exampleInputEmail1" value='<?php
                                                                                                                                                if (!empty($settings->twitter_username)) {
                                                                                                                                                    echo $settings->twitter_username;
                                                                                                                                                }
                                                                                                                                                ?>' placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('google_id'); ?></label>
                                                <input type="text" class="form-control" name="google_id" id="exampleInputEmail1" value='<?php
                                                                                                                                        if (!empty($settings->google_id)) {
                                                                                                                                            echo $settings->google_id;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('youtube_id'); ?></label>
                                                <input type="text" class="form-control" name="youtube_id" id="exampleInputEmail1" value='<?php
                                                                                                                                            if (!empty($settings->youtube_id)) {
                                                                                                                                                echo $settings->youtube_id;
                                                                                                                                            }
                                                                                                                                            ?>' placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('skype_id'); ?></label>
                                                <input type="text" class="form-control" name="skype_id" id="exampleInputEmail1" value='<?php
                                                                                                                                        if (!empty($settings->skype_id)) {
                                                                                                                                            echo $settings->skype_id;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value='<?php
                                                                            if (!empty($settings->id)) {
                                                                                echo $settings->id;
                                                                            }
                                                                            ?>'>
                                    <button type="submit" name="submit" class="btn btn-primary float-right mt-3"> <?php echo lang('submit'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>