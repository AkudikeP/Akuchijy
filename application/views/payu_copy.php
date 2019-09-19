<?php
//print_r($user);echo "<br><br>";
//print_r($user_data);


$total = $user['cart_contents']['cart_total'];
$email = $user_data->email;
$name = $user_data->name;
$mobile = $user_data->mobile;

// Merchant key here as provided by Payu
$MERCHANT_KEY = "wn6Kz96s"; //"hDkYGPQe"; //"vEKZKJpy";
//$MERCHANT_KEY = "JBZaLc";
// Merchant Salt as provided by Payu
$SALT = "6pIW85iiCB"; //"yIEkykqEH3"; //"nGKXuDJGGa";
//$SALT = "GQs7yium";
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {

  foreach($_POST as $key => $value) {
    $posted[$key] = $value;
  }
}


$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])

          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
          || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}

?>

  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      alert('done');
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }

  </script>
<?php  ?>
  <body onload="submitPayuForm()">


    <?php if($formError) { ?>



    <?php } ?>
    <?php   $price = $total; ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />



          <input type="hidden" name="amount" value="<?php echo $total; ?>" />
          <input type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" />



          <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
          <input type="hidden" name="phone" value="9999999999<?php //echo $mobile; ?>" />



          <input type="hidden" name="productinfo" value="<?php echo $_SESSION['oid']; ?>">


          <input type="hidden"  name="surl" value="<?php echo base_url(); ?>welcome/payu_order" size="64" />


          <input type="hidden" name="furl" value="<?php echo base_url(); ?>welcome/payu_fail" size="64" />



         <input type="hidden" name="service_provider" value="payu_paisa" size="64" />





          <?php   if(!$hash) { ?>
           <input type="submit" value="Submit" />
          <?php } ?>

    </form>
  </body>
  <script>
    window.onload = function(){
  document.forms['payuForm'].submit()

}
  </script>
