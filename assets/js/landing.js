
var variablejs = "<?php echo  base_url(); ?>" ;
console.log(variablejs)
$( document ).ready(function() {
    $( "#btnlogin" ).click(function() 
    {
        console.log('envia')
        
        var datas = new FormData();            
            datas.append("passworduser", $("#passworduser").val());
            datas.append("emlailuser", $("#emlailuser").val( ));
            $.ajax({
                //url: "<?php echo base_url(); ?>login2",
                url:"<?= base_url(); ?>Entidad/ModificarConvenio",
                dataType: 'json', // what to expect back from the server                                                                  
                data: datas,
                processData: false,
                cache: false,
                contentType: false,
                type: 'post',
                success: function(data) 
                {
                    
                }
            })
        
    });
});