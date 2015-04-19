var ASCOContact = (function($){

  var _initPlugins = function() {
    new WOW().init();
  };

  var _watchRecapthcaResponse = function() {
    $(document).on('verified-event', function(event, elem){
      if ( elem.data('verified') === true ) {
        elem.closest('form').find('input[type="submit"]').removeAttr('disabled');
      }
    });
  }

  var _contactFormHandler = function() {
    $('form[name="contact-form"]').on('valid.fndtn.abide', function(e){
      /* hack to fix double-validation event firing
      see: https://github.com/zurb/foundation/issues/5392#issuecomment-71142591 */
      if(e.namespace != 'abide.fndtn') {
        return;
      }
      $form = $(e.target);
      $submitBtn = $form.find('input[type="submit"]');

      $submitBtn.val('sending..').attr('disabled', 'disabled');
      $.post(
        "/wp-content/themes/ASC-Online/processform.php",
        $form.serialize(),
        function(data){
          if( data.status === 'success' ) {
            $form[0].reset();
            grecaptcha.reset();
            $submitBtn.attr('disabled', 'disabled');
            alertify.success(data.message);
            $submitBtn.val('Submit');
          }
          if (data.status === 'warning') {
            alertify.warning(data.message);
            grecaptcha.reset();
            $submitBtn.val('Submit');
          }
          if (data.status === 'error') {
            alertify.error(data.message + '. Error Message: ' + data.errors);
            grecaptcha.reset();
          }
        }
      );
    });
  };


  var _aptFormHandler = function() {
    $('form[name="appt-request-form"]').on('valid.fndtn.abide', function(e){
      /* hack to fix double-validation event firing
      see: https://github.com/zurb/foundation/issues/5392#issuecomment-71142591 */
      if(e.namespace != 'abide.fndtn') {
        return;
      }
      $form = $(e.target);
      $submitBtn = $form.find('input[type="submit"]');

      $submitBtn.val('sending..').attr('disabled', 'disabled');
      $.post(
        "/wp-content/themes/ASC-Online/processaptform.php",
        $form.serialize(),
        function(data){
          if( data.status === 'success' ) {
            $form[0].reset();
            grecaptcha.reset();
            $submitBtn.attr('disabled', 'disabled');
            alertify.success(data.message);
            $submitBtn.val('Submit');
          }
          if (data.status === 'warning') {
            alertify.warning(data.message);
            grecaptcha.reset();
            $submitBtn.val('Submit');
          }
          if (data.status === 'error') {
            alertify.error(data.message + '. Error Message: ' + data.errors);
            grecaptcha.reset();
          }
        }
      );
    });
  };


  var init = function(){
    console.log('ASCOContact::init() fired.');
    _initPlugins();
    _watchRecapthcaResponse();
    _contactFormHandler();
    _aptFormHandler();
  };

  return {
      init: init
  };

})(jQuery);