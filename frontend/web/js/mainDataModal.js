$(function (){        
    // get the click of the create button
    $('#modalButtonCreate').click(function (){
        $('#modaldata').modal('show')
                .find('#modalContentData')
                .load($(this).attr('value'))
    });
});

$(function(){
    $('.btn_update').click(function(){
        $('#modaldata').modal('show')
                .find('#modalContentData')
                .load($(this).attr('value'))
    });
});

$(function(){
    $('.btn_view').click(function(){
        $('#modaldata').modal('show')
                .find('#modalContentData')
                .load($(this).attr('value'))
    });
});

$(function(){
    $('.btn_upload').click(function(){
        $('#modaldataupload').modal('show')
                .find('#modalContentDataUpload')
                .load($(this).attr('value'))
    });
});