$(document).ready(function() {

    $('#table-tipo').on('click', 'button.btn-delet', function(e) {

        e.preventDefault()

        let IDTIPO_USUARIO = `IDTIPO_USUARIO=${$(this).attr('id')}`

        Swal.fire({
            title: 'Atenção!',
            text: 'Realmente deseja deletar este tipo de usuario?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    assync: true,
                    data: IDTIPO_USUARIO,
                    url: "src/tipo-usuario/model/delet-tipo.php",
                    success: function(dados) {
                        Swal.fire({
                            title: 'Sucesso!',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })
                        $('#table-tipo').DataTable().ajax.reload()
                    },
                    error: function(dados) {
                        Swal.fire({
                            title: 'Erro!',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })
                        $('#table-tipo').DataTable().ajax.reload()
                    }
                })
            }
        })
    })

})