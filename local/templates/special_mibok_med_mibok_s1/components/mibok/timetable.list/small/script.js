//$(document).ready(function(){
$(document).on('click', '.mibok-modal-timetable', function(){
	//$('.mibok-modal-timetable').on('click', function () {
        var lesson = $(this).parents('.element-item');
		var thisLink = $(this);
        var page = $('input[name=TIMETABLE_AJAX]').val();
        var field = $('input[name=FIELD_CODE_MODAL]').val();
        var prop = $('input[name=PROPERTY_CODE_MODAL]').val();
        var iblock = $('input[name=IBLOCK_ID_TIMETABLE]').val();
        var iblock_type = $('input[name=IBLOCK_TYPE_TIMETABLE]').val();
        var modal_name = $('input[name=LIST_SETTINGS_MODAL_NAME]').val();
        var modal_data = $('input[name=MODAL_DATA]').val();
        var time_info = lesson.find('input[name=TIME_INFO]').val();
        var prop_record = $('input[name=PROPERTY_CODES_RECORD]').val();
        var prop_record_req = $('input[name=PROPERTY_CODES_RECORD_REQUIRED]').val();
        var record_param = $('input[name=RECORD_PARAM]').val();
        var is_record = $('input[name=IS_RECORD]').val();
        var consent = $('input[name=CONSENT]').val();
        var element = lesson.attr('data-id');

        $.ajax({
            type: "POST",
            url: page,
            async: false,
            data: {ELEMENT_ID:element, FIELD:field, IBLOCK_ID: iblock, IBLOCK_TYPE:iblock_type, PROPERTY:prop, MODAL_NAME:modal_name, TIME_INFO: time_info, MODAL_DATA:modal_data, PROP_RECORD:prop_record, PROP_RECORD_REQ:prop_record_req, RECORD_PARAM:record_param, IS_RECORD:is_record, CONSENT:consent, SPECIAL:'Y'},
            success: function(data){
                lesson.find('.button-mibok-timetable').html(data);
                }
          });
		  thisLink.attr('disabled');
		  thisLink.addClass('disabled');
		  return false;
    })
	.on('input','.button-mibok-timetable form[name=iblock_add] input[type=text]', function(){
        MibokCheckSubmit()
	})
    .on('change','#iblock_consent', function()
    {
        if($('input#iblock_consent:checked').length <= 0)
        {
            $('.mibok-form-submit').attr('disabled', 'disabled');
        }
        else
        {
            MibokCheckSubmit();
        }
    })
	.on('input','.button-mibok-timetable form[name=iblock_add] textarea', function(){
        MibokCheckSubmit();
	})
//})


function MibokCheckSubmit()
{
    var count = $('.button-mibok-timetable form[name=iblock_add] *[data-req]').length;
    var countEach = 0;
    $('.button-mibok-timetable form[name=iblock_add] *[data-req]').each(function (ind, el)
    {
        if($(el).val() != '')
            countEach++;
    })
    if($('input#iblock_consent').length > 0)
    {
        if(countEach == count && $('input#iblock_consent:checked').length > 0)
            $('.mibok-form-submit').removeAttr('disabled');
        else
            $('.mibok-form-submit').attr('disabled', 'disabled');
    }
    else
    {
        if(countEach == count)
            $('.mibok-form-submit').removeAttr('disabled');
        else
            $('.mibok-form-submit').attr('disabled', 'disabled');
    }
}

$(document).ready(function(){
    if($('.element-item').length > 0)
    {
        var lengthItem = $('.element-item .count-rasp').length;
        
        if($('.count-rasp').length > 0)
        { 
            var arItem = new Object;
            var iblock = $('input[name=IBLOCK_ID_TIMETABLE]').val();
            var page = $('input[name=TIMETABLE_AJAX]').val();
            $('.count-rasp').each(function(ind){
                var item = $(this).parents('.element-item');
                var element = item.attr('data-id');
                var time_info = item.find('input[name=TIME_INFO]').val();
                //var id = $(this).attr('id');
                
                var count_rasp = $(this);
                arItem[ind] = {ELEMENT_ID:element, TIME_INFO: time_info}
                
            });
            $.ajax({
                type: "POST",
                url: page,
                dataType: 'json',
                data: {ITEMS:arItem, IBLOCK_ID: iblock, ACTION:'GetLimit'},
                success: function(data){
                    for(var elem in data)
                    {
                        var newCountRasp = $('.count-rasp[data-rasp-id="' + data[elem]['id']+'"]');
                        if(newCountRasp.length > 0)
                        {
                            newCountRasp.addClass(data[elem]['class']).html(data[elem]['table'] + '/' + data[elem]['iblock']);
                            if(data[elem]['class'] == 'no-item-record')
                                newCountRasp.addClass('glyphicon glyphicon-ban-circle');
                        }
                    }
                }
            });
        }
    }
	})
