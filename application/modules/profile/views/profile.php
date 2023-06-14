<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('manage_profile'); ?></h1>
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
                    <form role="form" action="profile/addNew" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                                                                                        if (!empty($profile->username)) {
                                                                                                                            echo $profile->username;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('change_password'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('email'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                                                                                        if (!empty($profile->email)) {
                                                                                                                            echo $profile->email;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value='<?php
                                                                if (!empty($profile->id)) {
                                                                    echo $profile->id;
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

<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>