<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php echo $this->element("/admin/css");?>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
		<?php echo $this->element("/admin/header");?>	
		<?php echo $this->fetch("content");?>
        <?php echo $this->element("/admin/js");?>
    </body>
</html>