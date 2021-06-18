$(document).ready(function() {

    $('#table-eixo').on('click', 'button.btn-edit', function(e) {

        e.preventDefault()

        // Limpando os campos do modal
        $('.modal-title').empty()
        $('.modal-body').empty()

        // Criando um título para nossa o modal
        $('.modal-title').append('Edição do eixos tecnologicos')

        // Pegando o id
        let IDEIXO = `IDEIXO=${$(this).attr('id')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: IDEIXO,
            url: "src/eixo/model/view-eixo.php",
            success: function(dado) {
                if (dado.tipo == "success") {
                    $('.modal-body').load('src/eixo/view/form-eixo.html', function() {
                        $('#NOME').val(dado.dados.NOME)
                        $('#IDEIXO').val(dado.dados.IDEIXO)
                    })
                    $('.save-btn').show()
                    $('.save-btn').removeAttr('data-operation')
                    $('#modal-eixo').modal('show')
                }
            }
        })
    })
})