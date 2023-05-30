<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('appointment'); ?> <?php echo lang('calendar'); ?></h1>
        </div>
        <div class="section-body">
                <aside>
                    <section class="panel">
                        <div class="panel-body">
                            <div id="calendar" class="has-toolbar calendar_view"></div>
                        </div>
                    </section>
                </aside>
        </div>
    </section>
</div>

<div class="modal fade" role="dialog" id="cmodal">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id='medical_history'>
                    <div class="col-md-12">

                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<!--main content end-->
<!--footer start-->
