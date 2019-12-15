


// File type validation
$("#file").change(function() {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['image/jpeg', 'image/png', 'image/jpg'];
    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
        alert('Sorry, only JPG, JPEG, & PNG files are allowed to upload.');
        $("#file").val('');
        return false;
    }
});

$('form#upload-clothes-form').submit(function(event){
    event.preventDefault()
    var productFormData = new FormData(this)
    // console.log('test')
    // console.log($('form').serialize())
    $.ajax({
        url : "../includes/insert.product.php",
        method: "POST",
        data: productFormData,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,

    })
    .done(function(response){

        if( response.status === 1 ){
            window.location='../profile/profile.php'
        }else{
            $('#error_message').text(response.message)
        }
        console.log(response)
    })
    .fail(function(fail){
        $('#error_message').text(fail.message)
    })

})



