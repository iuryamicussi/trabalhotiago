function buscarRegistros(){
    let campoPesquisa = $('#nomePesquisado');
    if(campoPesquisa.val() == "") return;
    let dados = campoPesquisa.serialize();
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: 'busca.php',
      async: true,
      data: dados,
      success: function (response) {
        $("#tabela").children().last().children().remove()
        if (response.length <= 0) {
          alert("Não há doadores com o nome: " + campoPesquisa.val());
          campoPesquisa.val("").focus();
        } else {
          let registros = "";
          response.forEach(element => {
            console.log(element);
            registros = registros + "<tr><td>" + element.primeironome + "</td>" +
              "<td>" + element.nickname + "</td>" +
              "<td>" + element.sangue + "</td></tr>";
          });
          $("#tabela").children().last().append(registros);
        }
      }
    });
  }