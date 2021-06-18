$(document).ready(function() {

    $('#table-eixo').on('click', 'button.btn-delet', function(e) {

        e.preventDefault()

        let IDEIXO = `IDEIXO=${$(this).attr('id')}`

        Swal.fire({
            title: 'Atenção!',
            text: 'Realmente deseja deletar este eixo tecnologico?',
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
                    data: IDEIXO,
                    url: "src/eixo/model/delet-eixo.php",
                    success: function(dados) {
                        Swal.fire({
                            title: 'Sucesso!',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })
                        $('#table-eixo').DataTable().ajax.reload()
                    },
                    error: function(dados) {
                        Swal.fire({
                            title: 'Erro!',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })
                        $('#table-eixo').DataTable().ajax.reload()
                    }
                })
            }
        })
    })

})