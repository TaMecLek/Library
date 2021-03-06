$(document).ready(function() {

    $('#table-tipo').on('click', 'button.btn-view', function(e) {

        e.preventDefault()

        // Limpando os campos do modal
        $('.modal-title').empty()
        $('.modal-body').empty()

        // Criando um título para nossa o modal
        $('.modal-title').append('Visualização do tipo de usuário')

        // Pegando o id
        let IDTIPO_USUARIO = `IDTIPO_USUARIO=${$(this).attr('id')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: IDTIPO_USUARIO,
            url: "src/tipo-usuario/model/view-tipo.php",
            success: function(dado) {
                if (dado.tipo == "success") {
                    $('.modal-body').load('src/tipo-usuario/view/form-tipo.html', function() {
                        $('#DESCRICAO').val(dado.dados.DESCRICAO)
                        $('#DESCRICAO').attr('readonly', 'true')
                    })
                    $('.save-btn').hide()
                    $('#modal-tipo').modal('show')
                }
            }
        })
    })
})