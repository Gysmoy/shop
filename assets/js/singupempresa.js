$('#btn-sig1').click(function (e) { 
    e.preventDefault();
    $('#form2-empresa').show(250)
    $('#form1-empresa').hide();
});

$('#btn-atras').click(function (e) { 
    e.preventDefault();
    $('#form2-empresa').hide()
    $('#form1-empresa').show(250);
});




