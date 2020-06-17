$(document).ready(function(){

    var DIRPAGE = "http://"+document.location.hostname+"/Mvc/";

    $('#FormSeleciona').on('submit', function(event){
        event.preventDefault();
        var Dados=$(this).serialize();

        $.ajax({
            url: DIRPAGE+'cadastro/selecionar',
            method: 'post',
            dataType: 'html',
            data: Dados,
            success:function(Dados){
                $('.Resultado').html(Dados);
            }
        });
    });

    $(document).on('click','.imgEdit', function(){
        var imgRel=$(this).attr('rel');
        
        $.ajax({
            url: DIRPAGE+'cadastro/puxaDB/'+imgRel,
            method: 'post',
            dataType: 'html',
            data: {'Id': imgRel},
            success:function(data){
                $('.ResultadoFormulario').html(data);
            }
        })
    })
});