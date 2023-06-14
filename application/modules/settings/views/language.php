<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('language'); ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="section-title"><?php echo lang('select'); ?> <?php echo lang('language'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <form role="form" id="editSaleForm" action="settings/changeLanguage" class="clearfix" method="post" enctype="multipart/form-data">
                                <select class="form-control select2" name="language" value=''>
                                    <option value="arabic" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'arabic') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('arabic'); ?>
                                    </option>
                                    <option value="german" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'german') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('german'); ?>
                                    </option>
                                    <option value="persian" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'persian') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('persian'); ?>
                                    </option>
                                    <option value="english" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'english') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('english'); ?>
                                    </option>
                                    <option value="zh_cn" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'zh_cn') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('chinese'); ?>
                                    </option>
                                    <option value="spanish" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'spanish') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('spanish'); ?>
                                    </option>
                                    <option value="french" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'french') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('french'); ?>
                                    </option>
                                    <option value="italian" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'italian') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('italian'); ?>
                                    </option>
                                    <option value="portuguese" <?php
                                                                if (!empty($settings->language)) {
                                                                    if ($settings->language == 'portuguese') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>><?php echo lang('portuguese'); ?>
                                    </option>
                                    <option value="russian" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'russian') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('russian'); ?>
                                    </option>
                                    <option value="turkish" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'turkish') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('turkish'); ?>
                                    </option>
                                    <option value="indonesian" <?php
                                                                if (!empty($settings->language)) {
                                                                    if ($settings->language == 'indonesian') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>><?php echo lang('indonesian'); ?>
                                    </option>
                                    <option value="japanese" <?php
                                                                if (!empty($settings->language)) {
                                                                    if ($settings->language == 'japanese') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>><?php echo lang('japanese'); ?>
                                    </option>
                                </select>
                                <input type="hidden" name="language_settings" value='language_settings'>
                                <input type="hidden" name="id" value='<?php
                                                                        if (!empty($settings->id)) {
                                                                            echo $settings->id;
                                                                        }
                                                                        ?>'>
                                <button type="submit" name="submit" class="btn btn-primary mt-3 float-right"> <?php echo lang('submit'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="section-title"><?php echo lang('edit'); ?> <?php echo lang('language'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th><?php echo lang('name'); ?></th>
                                            <th><?php echo lang('options'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <td><?php echo '1'; ?></td>
                                            <td><?php echo lang('arabic'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=arabic"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '2'; ?></td>
                                            <td><?php echo lang('english'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=english"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '3'; ?></td>
                                            <td><?php echo lang('chinese'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=zh_cn"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '4'; ?></td>
                                            <td><?php echo lang('spanish'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=spanish"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '5'; ?></td>
                                            <td><?php echo lang('french'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=french"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '6'; ?></td>
                                            <td><?php echo lang('italian'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=italian"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '7'; ?></td>
                                            <td><?php echo lang('portuguese'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=portuguese"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '8'; ?></td>
                                            <td><?php echo lang('russian'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=russian"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '9'; ?></td>
                                            <td><?php echo lang('turkish'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=turkish"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '10'; ?></td>
                                            <td><?php echo lang('indonesian'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=indonesian"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '11'; ?></td>
                                            <td><?php echo lang('japanese'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=japanese"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '12'; ?></td>
                                            <td><?php echo lang('persian'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=persian"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '13'; ?></td>
                                            <td><?php echo lang('german'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=german"> <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script src="common/js/codearistos.min.js"></script>