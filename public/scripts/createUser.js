$(function(){

    $('#uploadProfilePic').click(function(){
        $("#fileUpload").trigger('click');
    });

    $('#fileUpload').on('change',function ()
    {
        var filePath = $(this).val();
        console.log(filePath);
        $('#picName').text(filePath.substr(12));
    });

});