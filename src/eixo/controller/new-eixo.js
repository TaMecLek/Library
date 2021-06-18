$(document).ready(function() {

    $('.new-btn').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()

        $('.modal-title').append('Adicionar novo eixos tecnologicos')

        $('.modal-body').load('src/eixo/view/form-eixo.html')

        $('.save-btn').show()

        $('.save-btn').attr('data-operation', 'insert')

        $('#modal-eixo').modal('show')
    })

})