
<body>
<?php echo form_open('login/ingresar/'); ?>
<div id="main">

	<div class="container" align="center" id="login">
		<div class="row">
			<label for="basic-url">Usuario:</label id = "label">
			<div class="input-group">
	  			<input type="text" class="form-control" name="tuser" placeholder="Usuario" size="40">
			</div>
		</div>
		<div class="row" >
			<label for="basic-url" >Password:</label>
			<div class="input-group">
	  			<input type="password" class="form-control" name="tpass" placeholder="Contraseña" size="40">
			</div>
		</div>
		<div class="row">
			<div class="input"><input type="submit" name="ingresar" value="Ingresar">
			</div>
		</div>
	</div>
</div>
<div class="container" align="center" id="error">

<?php
	if(isset($error)){
		echo $error;
	}
?>

</div>
<?php
echo "<div class='error_msg' align='center'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
?>
</body>
