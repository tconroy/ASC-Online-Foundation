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
    $('form').on('valid.fndtn.abide', function(e){
      /* hack to fix double-validation event firing
      see: https://github.com/zurb/foundation/issues/5392#issuecomment-71142591 */
      if(e.namespace != 'abide.fndtn') {
        return;
      }
      $form = $(e.target);
      $.post(
        "/wp-content/themes/ASC-Online/processform.php",
        $form.serialize(),
        function(data){
          if( data.status === 'success' ) {
            $form[0].reset();
            grecaptcha.reset();
            alertify.success('Message recieved! Someone will be in touch shortly.');
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
  };

  return {
      init: init
  };

})(jQuery);