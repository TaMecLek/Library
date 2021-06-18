$(document).ready(function() {

    $(".save-btn").click(function(e) {
        e.preventDefault()

        let dados = $('#form-eixo').serialize()

        dados += `&operacao=${$('.save-btn').attr('data-operation')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: dados,
            url: 'src/eixo/model/save-eixo.php',
            success: function(dados) {
                Swal.fire({
                        title: 'Library',
                        text: dados.mensagem,
                        icon: dados.tipo,
                        confirmButtonText: 'OK'
                    }),
                    $('#modal-eixo').modal('hide'),
                    $('#table-eixo').DataTable().ajax.reload()
            }
        })
    })
})