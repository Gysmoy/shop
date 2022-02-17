$('#message-shop-cont').hide();

$('#init-session-facebook').click(function (e) {
    e.preventDefault();
    alertBTS('Esta opcion aun no esta disponible', 'warning')
});
$('#init-session-google').click(function (e) { 
    e.preventDefault();
    alertBTS('Esta opcion aun no esta disponible', 'warning')
});

$('form').submit(function (e) {
    e.preventDefault();
    var request = {}
    
    request['email'] = $('#email').val();
    request['password'] = $('#pass').val();
    $.ajax({
        type: "POST",
        url: "../../../api/client/access",
        dataType: "json",
        data: request
        
    }).done( function (data){
        if(data.status=='200'){
            alertBTS(data.message,'success')
            setTimeout( () => { window.open("index.php","_self"), 2500 });
           
        }else{
            alertBTS(data.message,'danger')
        }
    }).fail( function (data){
        alertBTS((data.responseJSON.message),'danger')
        console.log(data)
    });
    

});