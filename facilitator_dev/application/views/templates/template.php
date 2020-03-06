<!doctype html>
<html>
<head>
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="content-type" content="text/html; charset=<?php echo config_item('charset');?>" />
   <title><?php echo $this->config->item($this->router->fetch_class().'_'.$this->router->fetch_method().'_title'); ?></title>
   <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
   <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
   <meta name="author" content="AdminDesigns">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Font CSS (Via CDN) -->
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
   <!-- Theme CSS -->

   <?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?>
   <title><?php echo $this->config->item($this->router->fetch_class().'_'.$this->router->fetch_method().'_title'); ?></title>
   <!-- <link rel="shortcut icon" href="<?php //echo $this->config->item('main_url').$this->config->item('images_path').'favicon.ico?v=1'; ?>" type="image/x-icon"> -->
   <link href="<?php echo base_url($this->config->item('css_xcharts_min')); ?>" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url($this->config->item('css_skin_default_skin_css_theme')); ?>" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url($this->config->item('css_skin_default_skin_css_theme2')); ?>" rel="stylesheet" type="text/css">
   <link href='<?php echo base_url($this->config->item('css_skin_default_skin_css_theme3')); ?>' rel='stylesheet' type='text/css'>
   <link href='<?php echo base_url($this->config->item('css_admin_tools_admin_forms_css_admin_forms')); ?>' rel='stylesheet' type='text/css'>
   <link href="<?php echo base_url($this->config->item('css_custom')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url($this->config->item('css_sweetalert')); ?>" rel="stylesheet" type="text/css">
   <!-- Favicon -->
   <!--
      <link rel="shortcut icon" href="assets/img/favicon.png">
      -->
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
   <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"   rel="stylesheet" type="text/css" />

</head><?php //echo $this->router->fetch_class().'_'.$this->router->fetch_method();exit; ?>
<?php $this->load->view($this->config->item($this->router->fetch_class().'_'.$this->router->fetch_method().'_view'));
?>
</html>