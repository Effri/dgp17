BX.addCustomEvent('onAjaxSuccess', function() {
	$('#myModalConsent, #myModalConsentRew').on('shown.bs.modal', function (e) {
	   $('.mibok-consent-text').perfectScrollbar('update');
   })
	$('#myModalConsent, #myModalConsentRew').on('show.bs.modal', function (e) {
		$('.mibok-consent-text').perfectScrollbar();
		var $bodyWidth = $("body").width();
        $("body").css({'overflow-y': "hidden"}).css({'padding-right': ($("body").width()-$bodyWidth)});
   })
	$('#myModalConsent, #myModalConsentRew').on('hide.bs.modal', function (e) {
		 $("body").css({'padding-right': "0", 'overflow-y': "auto"});
   })
   if($('form[name="iblock_add_contact"]').find('.g-recaptcha').length > 0 && $('form[name="iblock_add_contact"]').find('iframe').length == 0)
   {
        var widgetId = grecaptcha.render('recaptcha-contact');
        grecaptcha.reset(widgetId);
   }
});