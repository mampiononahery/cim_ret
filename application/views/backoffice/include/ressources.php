<link rel="stylesheet" href="<?php echo css_url('style.default') ?>" type="text/css" />

<?php echo @css_files($css_files) ?>

<script type="text/javascript" src="<?php echo js_url('jquery-1.9.1.min') ?>"></script>
<script type="text/javascript" src="<?php echo js_url('jquery-migrate-1.1.1.min') ?>"></script>
<script type="text/javascript" src="<?php echo js_url('jquery-ui-1.9.2.min') ?>"></script>
<script type="text/javascript" src="<?php echo js_url('modernizr.min') ?>"></script>
<script type="text/javascript" src="<?php echo js_url('bootstrap.min') ?>"></script>
<script type="text/javascript" src="<?php echo js_url('jquery.cookie') ?>"></script>
<script type="text/javascript" src="<?php echo js_url('jquery.uniform.min') ?>"></script>
<script type="text/javascript" src="<?php echo js_url('custom') ?>"></script>
<?php echo @js_files($js_files) ?>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo js_url('excanvas.min') ?>"></script><![endif]-->