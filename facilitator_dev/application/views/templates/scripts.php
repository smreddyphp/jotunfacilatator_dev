<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="<?php echo base_url($this->config->item('js_vendor_jquery_jquery_ui_jquery_ui_min')); ?>" type="text/javascript"></script>
<script>
  $(document).ready(function(){
    $(".accordion-toggle").click(function(){
      if ($('.sub-nav').is(':visible')) {
        $(".plusminus").text('+');
      }
      $(this).children(".plusminus").text('-');
      if($(this).hasClass("menu-open"))
      {
        $(this).children(".plusminus").text('+');
      }
    });
  });
</script>
<script src="<?php echo base_url($this->config->item('js_vendor_plugins_highcharts_highcharts')); ?>" type="text/javascript"></script>
<script src='<?php echo base_url($this->config->item('js_assets_js_utility_utility')); ?>' type='text/javascript'></script>
<script src="<?php echo base_url($this->config->item('js_assets_js_main')); ?>" type='text/javascript'></script>
<script src="<?php echo base_url($this->config->item('js_assets_js_demo_demo')); ?>" type='text/javascript'></script>
<script src="<?php echo base_url($this->config->item('js_vendor_plugins_sparkline_jquery_sparkline_min')); ?>" type='text/javascript'></script>
<script src="<?php echo base_url($this->config->item('js_widgets')); ?>" type='text/javascript'></script>
<script src="<?php echo base_url($this->config->item('js_growl_min')); ?>" type='text/javascript'></script>
<script src="<?php echo base_url($this->config->item('js_ajax')); ?>" type='text/javascript'></script>
<script src="<?php echo base_url($this->config->item('js_actions')); ?>" type='text/javascript'></script>
<script src="<?php echo base_url($this->config->item('js_sweetalert.min')); ?>" type='text/javascript'></script>
<script src="<?php echo base_url($this->config->item('js_bootstrap-multiselect')); ?>" type='text/javascript'></script>
<script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core
    Core.init();

    // Init Demo JS
    Demo.init();
  });
</script>

<script type="text/javascript">

    <?php if($this->session->flashdata('flash_success')): ?>
        notify('success', "<?php echo $this->session->flashdata('flash_success'); ?>");
    <?php endif; ?>

    <?php if($this->session->flashdata('flash_failure')): ?>
        notify('failure', "<?php echo $this->session->flashdata('flash_failure'); ?>");
    <?php endif; ?>

    <?php if(isset($error) && !empty($error)): ?>
        notify('failure', "<?php echo $error; ?>");
    <?php endif; ?>

    // Notify
    function notify(status, message) {

        if(status == 'success')
            $.growl.notice({
                title : "Success",
                message : message
            });
        else
            $.growl.error({
                title : "Error",
                message : message
            });
    }
</script>