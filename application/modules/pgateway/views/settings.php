<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('settings'); ?> <?php
                                                if (!empty($settings->name)) {
                                                    echo $settings->name;
                                                }
                                                ?></h1>
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
                    <form role="form" action="pgateway/addNewSettings" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('payment_gateway'); ?> <?php echo lang('name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                                                                                        if (!empty($settings->name)) {
                                                                                                                            echo $settings->name;
                                                                                                                        }
                                                                                                                        ?>' placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <?php if ($settings->name == "Pay U Money") { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('merchant_key'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="merchant_key" id="exampleInputEmail1" value="<?php
                                                                                                                                    if (!empty($settings->merchant_key)) {
                                                                                                                                        echo $settings->merchant_key;
                                                                                                                                    }
                                                                                                                                    ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('salt'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="salt" id="exampleInputEmail1" value='<?php
                                                                                                                            if (!empty($settings->salt)) {
                                                                                                                                echo $settings->salt;
                                                                                                                            }
                                                                                                                            ?>'>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('salt'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="salt" id="exampleInputEmail1" value='<?php
                                                                                                                            if (!empty($settings->salt)) {
                                                                                                                                echo $settings->salt;
                                                                                                                            }
                                                                                                                            ?>'>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->name == "Authorize.Net") { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('apiloginid'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="apiloginid" id="exampleInputEmail1" value="<?php
                                                                                                                                    if (!empty($settings->apiloginid)) {
                                                                                                                                        echo $settings->apiloginid;
                                                                                                                                    }
                                                                                                                                    ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('transactionkey'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="transactionkey" id="exampleInputEmail1" value="<?php
                                                                                                                                            if (!empty($settings->transactionkey)) {
                                                                                                                                                echo $settings->transactionkey;
                                                                                                                                            }
                                                                                                                                            ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->name == "Paytm") { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('merchant_key'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="merchant_key" id="exampleInputEmail1" value="<?php
                                                                                                                                    if (!empty($settings->merchant_key)) {
                                                                                                                                        echo $settings->merchant_key;
                                                                                                                                    }
                                                                                                                                    ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('merchant_mid'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="merchant_mid" id="exampleInputEmail1" value="<?php
                                                                                                                                        if (!empty($settings->merchant_mid)) {
                                                                                                                                            echo $settings->merchant_mid;
                                                                                                                                        }
                                                                                                                                        ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('merchant_website'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="merchant_website" id="exampleInputEmail1" value="<?php
                                                                                                                                            if (!empty($settings->merchant_website)) {
                                                                                                                                                echo $settings->merchant_website;
                                                                                                                                            }
                                                                                                                                            ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->name == "Paystack") { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('secretkey'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="secret" id="exampleInputEmail1" value="<?php
                                                                                                                                if (!empty($settings->secret)) {
                                                                                                                                    echo $settings->secret;
                                                                                                                                }
                                                                                                                                ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('public_key'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="public_key" id="exampleInputEmail1" value='<?php
                                                                                                                                        if (!empty($settings->public_key)) {
                                                                                                                                            echo $settings->public_key;
                                                                                                                                        }
                                                                                                                                        ?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->name == "PayPal") { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('api_username'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="APIUsername" id="exampleInputEmail1" value="<?php
                                                                                                                                    if (!empty($settings->APIUsername)) {
                                                                                                                                        echo $settings->APIUsername;
                                                                                                                                    }
                                                                                                                                    ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('api_password'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="APIPassword" id="exampleInputEmail1" value='<?php
                                                                                                                                        if (!empty($settings->APIPassword)) {
                                                                                                                                            echo $settings->APIPassword;
                                                                                                                                        }
                                                                                                                                        ?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('api_signature'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="APISignature" id="exampleInputEmail1" value='<?php
                                                                                                                                        if (!empty($settings->APISignature)) {
                                                                                                                                            echo $settings->APISignature;
                                                                                                                                        }
                                                                                                                                        ?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->name == "2Checkout") { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('merchantcode'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="merchantcode" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($settings->merchantcode)) {
                                                                                                                                        echo $settings->merchantcode;
                                                                                                                                    }
                                                                                                                                    ?>'>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('privatekey'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="privatekey" id="exampleInputEmail1" value="<?php
                                                                                                                                        if (!empty($settings->privatekey)) {
                                                                                                                                            echo $settings->privatekey;
                                                                                                                                        }
                                                                                                                                        ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('publishablekey'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="publishablekey" id="exampleInputEmail1" value="<?php
                                                                                                                                            if (!empty($settings->publishablekey)) {
                                                                                                                                                echo $settings->publishablekey;
                                                                                                                                            }
                                                                                                                                            ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->name == "SSLCOMMERZ") { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('store_id'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="store_id" id="exampleInputEmail1" value="<?php
                                                                                                                                if (!empty($settings->store_id)) {
                                                                                                                                    echo $settings->store_id;
                                                                                                                                }
                                                                                                                                ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('store_password'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="store_password" id="exampleInputEmail1" value='<?php
                                                                                                                                            if (!empty($settings->store_password)) {
                                                                                                                                                echo $settings->store_password;
                                                                                                                                            }
                                                                                                                                            ?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->name == "Stripe") { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('secretkey'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="secret" id="exampleInputEmail1" value='<?php
                                                                                                                                if (!empty($settings->secret)) {
                                                                                                                                    echo $settings->secret;
                                                                                                                                }
                                                                                                                                ?>' placeholder="" <?php
                                                                                                                                                    if (!$this->ion_auth->in_group('admin')) {
                                                                                                                                                        echo 'disabled';
                                                                                                                                                    }
                                                                                                                                                    ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('publishkey'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="publish" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($settings->publish)) {
                                                                                                                                        echo $settings->publish;
                                                                                                                                    }
                                                                                                                                    ?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label for="exampleInputEmail1"><?php echo lang('status'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group mb-2">
                                        <select class="form-control select2" name="status">
                                            <option value="live" <?php
                                                                    if (!empty($settings->status)) {
                                                                        if ($settings->status == 'live') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>><?php echo lang('live'); ?> </option>
                                            <option value="test" <?php
                                                                    if (!empty($settings->status)) {
                                                                        if ($settings->status == 'test') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>><?php echo lang('test'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($settings->name == "2Checkout") { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"></label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-danger"> Available only Live mood .</p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->name == "SSLCOMMERZ") { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('ipnsettings'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="" id="exampleInputEmail1" value=' <?php echo base_url(); ?>sslcommerzpayment/success' readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"></label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-danger">
                                            Copy Ipn_settings to your merchant sslcommerz account. Follow steps below:<br>
                                            >>Login at https://merchant.sslcommerz.com/ (LIVE) and https://sandbox.sslcommerz.com/manage/(TEST) <br>
                                            >>Click on Menu My Stores > IPN Settings <br>
                                            >>Tick mark Enable HTTP Listener, input above URL in the Box and save settings.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="id" value='<?php
                                                                if (!empty($settings->id)) {
                                                                    echo $settings->id;
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

<div class="modal fade" role="dialog" id="myModal1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_new'); ?> <?php echo lang('template'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="myform1" action="email/addNewManualTemplate" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('templatename'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                                                                            if (!empty($templatename->name)) {
                                                                                                                echo $templatename->name;
                                                                                                            }
                                                                                                            if (!empty($setval)) {
                                                                                                                echo set_value('name');
                                                                                                            }
                                                                                                            ?>' placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('message'); ?> <?php echo lang('template'); ?></label>
                        <div class="selectgroup w-100">
                            <?php
                            foreach ($shortcode as $shortcodes) { ?>
                                <label class="selectgroup-item">
                                    <input type="radio" name="myBtn" value="<?php echo $shortcodes->name; ?>" class="selectgroup-input" onClick="addtext1(this);">
                                    <span class="selectgroup-button"><?php echo $shortcodes->name; ?></span>
                                </label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control ckeditor" name="message" value="<?php
                                                                                        if (!empty($templatename->message)) {
                                                                                            echo $templatename->message;
                                                                                        }
                                                                                        if (!empty($setval)) {
                                                                                            echo set_value('message');
                                                                                        }
                                                                                        ?>" required id="editor2" rows="70" cols="70"><?php
                                                                                                                                        if (!empty($templatename->message)) {
                                                                                                                                            echo $templatename->message;
                                                                                                                                        }
                                                                                                                                        if (!empty($setval)) {
                                                                                                                                            echo set_value('message');
                                                                                                                                        }
                                                                                                                                        ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="id" value='<?php
                                                        if (!empty($templatename->id)) {
                                                            echo $templatename->id;
                                                        }
                                                        ?>'>
                <input type="hidden" name="type" value='email'>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="common/js/codearistos.min.js"></script>