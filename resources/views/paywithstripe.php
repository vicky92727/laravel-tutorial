<!DOCTYPE html>
<html>
<head>
    <title>Laravel Tutorial</title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
<div class="container">
    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
          <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
<form accept-charset="UTF-8" action="<?=action('AddMoneyController@postPaymentWithStripe')?>" class="require-validation"
    data-cc-on-file="false"
    data-stripe-publishable-key="test_public_key"
    id="payment-form" method="post">
    <?=csrf_field()?>
    <div class='form-row'>
        <div class='col-xs-12 form-group required'>
            <label class='control-label'>Name on Card</label> <input
                class='form-control' name="name" size='4' type='text'>
        </div>
    </div>
    <div class='form-row'>
        <div class='col-xs-12 form-group card required'>
            <label class='control-label'>Card Number</label> <input
                autocomplete='off' name="card_no" class='form-control card-number' size='20'
                type='text'>
        </div>
    </div>
    <div class='form-row'>
        <div class='col-xs-4 form-group cvc required'>
            <label class='control-label'>CVC</label> <input autocomplete='off'
                class='form-control card-cvc' name="cvvNumber" placeholder='ex. 311' size='4'
                type='text'>
        </div>
        <div class='col-xs-4 form-group expiration required'>
            <label class='control-label'>Expiration</label> <input
                class='form-control card-expiry-month' name="ccExpiryMonth" placeholder='MM' size='2'
                type='text'>
        </div>
        <div class='col-xs-4 form-group expiration required'>
            <label class='control-label'> </label> <input
                class='form-control card-expiry-year' name="ccExpiryYear" placeholder='YYYY' size='4'
                type='text'>
        </div>
    </div>
    <div class='form-row'>
        <div class='col-md-12'>
            <div class='form-control total btn btn-info'>
                Total: <span class='amount'>$300</span>
            </div>
            <input type="hidden" name="amount" value="300">
        </div>
    </div>
    <div class='form-row'>
        <div class='col-md-12 form-group'>
            <button class='form-control btn btn-primary submit-button'
                type='submit' style="margin-top: 10px;">Pay »</button>
        </div>
    </div>
    <div class='form-row'>
        <div class='col-md-12 error form-group hide'>
            <div class='alert-danger alert'>Please correct the errors and try
                again.</div>
        </div>
    </div>
</form>
</div>
        <div class='col-md-4'></div>
    </div>
</div>
<script type="text/javascript">
/*    $(function() {
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(e.target).closest('form'),
        inputSelector = ['input[type=email]', 
                            'input[type=password]',
                         'input[type=text]', 
                         'input[type=file]',
                         'textarea'
                         ].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
$errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault(); // cancel on first error
      }
    });
  });
});*/
</script>
</body>
</html>