<!DOCTYPE html>
<html>
<head>
	<title>Ansvel</title>
</head>
<body>
<div style="">
<center><img src="<?=base_url();?>assets/images/logo2.jpg" style="margin-top:10%;"></center>
<br><br>
<center><p style="font-size: 18px">Your transaction has been <b>failed</b> by <b>PayU</b></p></center>
</div>
</body>
</html>
<script type="text/javascript">
	setTimeout(function () {
   window.location.href= '<?=base_url();?>welcome/cart'; // the redirect goes here

},1000);
</script>