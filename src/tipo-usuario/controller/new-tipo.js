$(document).ready(function() {

    $(".new-btn").click(function(e) {

        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()

        $('.modal-title').append('Adicionar novo tipo de usuario')

        $('.modal-body').load('src/tipo-usuario/view/form-tipo.html')

        $('.save-btn').show()

        $('.save-btn').attr('data-operation', 'insert')

        $('#modal-tipo').modal('show')
    })
})