<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>
                <?php
                if ($languagename == 'arabic') {
                    $language = lang('arabic');
                }
                if ($languagename == 'english') {
                    $language = lang('english');
                }
                if ($languagename == 'italian') {
                    $language = lang('italian');
                }
                if ($languagename == 'french') {
                    $language = lang('french');
                }
                if ($languagename == 'indonesian') {
                    $language = lang('indonesian');
                }
                if ($languagename == 'zh_cn') {
                    $language = lang('chinese');
                }
                if ($languagename == 'spanish') {
                    $language = lang('spanish');
                }
                if ($languagename == 'portuguese') {
                    $language = lang('portuguese');
                }
                if ($languagename == 'russian') {
                    $language = lang('russian');
                }
                if ($languagename == 'turkish') {
                    $language = lang('turkish');
                }
                if ($languagename == 'japanese') {
                    $language = lang('japanese');
                }
                if ($languagename == 'persian') {
                    $language = lang('persian');
                }
                if ($languagename == 'german') {
                    $language = lang('german');
                }
                ?>
                <?php echo lang('language'); ?> <?php echo lang('translation'); ?> : <?php echo $language; ?>
            </h1>
        </div>
        <?php
        $message = validation_errors();
        if (!empty($message)) {
        ?><div class="alert alert-primary alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <div class="alert-title">Info!</div>
                    <?= $message ?>
                </div>
            </div>
        <?php } ?>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="settings/addLanguageTranslation" class="clearfix" method="post" enctype="multipart/form-data" id="myForm">
                        <input type="hidden" name="language" value="<?php echo $languagename; ?>">
                        <input type="hidden" name="valueupdate" value="">
                        <input type="hidden" name="indexupdate" value="">
                        <div class="table-responsive">
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th><?php echo lang('name'); ?></th>
                                        <th><?php echo lang('translation'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($languages as $key => $value) {
                                        $i = $i + 1;
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <input type="text" class="form-control" name="index[]" id="index" value='<?php
                                                                                                                            echo $key;
                                                                                                                            ?>' placeholder="" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="value[]" id="value" value="<?php
                                                                                                                            echo $value;
                                                                                                                            ?>" placeholder="">
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary mt-3 float-right"> <?php echo lang('submit'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


<script src="common/js/codearistos.min.js"></script>
<script src="common/js/codearistos.min.js"></script>
<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
<script>
    $(document).ready(function() {
        $("#submit").click(function() {
            var indexes = $("input[name='index[]']")
                .map(function() {
                    return $(this).val();
                }).get();
            var values = $("input[name='value[]']")
                .map(function() {
                    return $(this).val();
                }).get();
            $("input[name='value[]']").attr("disabled");
            $("input[name='index[]']").attr("disabled");
            var indexupdate = "";
            var valueupdate = ""
            $.each(indexes, function(index, value) {
                indexupdate = indexupdate + "#**##***" + value;
            });
            $.each(values, function(index, value) {
                valueupdate = valueupdate + "*##**###" + value;
            });
            $('#myForm').find('[name="valueupdate"]').val(valueupdate).end()
            $('#myForm').find('[name="indexupdate"]').val(indexupdate).end()
            $('#myForm').submit();
        });
    });
</script>