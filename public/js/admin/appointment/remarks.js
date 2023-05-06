// accept button
$(document).ready(function(){
    $('.remarks-btn').on('click', function(){
        $('#remarks_modal').modal('show');
        var remarks_id = $(this).data('remarks-id');
        var first_name = $(this).data('remarks-first');
        var last_name = $(this).data('remarks-last');
        console.log(remarks_id);
        console.log(first_name);
        console.log(last_name);
        $('#remarks_modal').find('#app_id').val(remarks_id);
        $('#remarks_modal').find('#first_name').text(first_name);
        $('#remarks_modal').find('#last_name').text(last_name);
    });
});

$(document).ready(function(){
    $('.status').each(function() {
        var status = $(this).text();
        var $td = $(this).closest('td');
        var $buttons = $(this).parent().find('.btn');
        if(status === "Pending"){
            $td.css('background-color', '#ffecb3');
            $buttons.filter('#accept-btn').show();
            $buttons.filter('#done-btn').hide();
            $buttons.filter('#claimed-btn').hide();
        } else if(status === "On Process"){
            $td.css('background-color', '#c0deff');
            $buttons.filter('#accept-btn').hide();
            $buttons.filter('#done-btn').show();
            $buttons.filter('#claimed-btn').hide();
        } else if(status === "Ready to Claim"){
            $td.css('background-color', '#dcffe4');
            $buttons.filter('#accept-btn').hide();
            $buttons.filter('#done-btn').hide();
            $buttons.filter('#claimed-btn').show();
        }else{
            $buttons.filter('#accept-btn').hide();
            $buttons.filter('#done-btn').hide();
            $buttons.filter('#claimed-btn').hide();
        }
    });
});
