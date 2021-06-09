$(document).ready(function() {

    $(".nav-link").click(function(e) {

        e.preventDefault()

        // Capturando a url
        let url = $(this).attr('href')

        // Esvaziando o #conteudo e carregando o que está na url
        $('#conteudo').empty()
        $('#conteudo').load(url)

    })

})