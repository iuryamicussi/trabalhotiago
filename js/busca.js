function buscarRegistros() {
  let campoPesquisa = $('#nomePesquisado');
  if (campoPesquisa.val() == "") return;
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
          registros = registros + "<tr><td>" + element.primeironome + "</td>" +
            "<td>" + element.nickname + "</td>" +
            "<td>" + element.sangue + "</td>" +
            "<td><input type='button' value='Apagar' class='botao-excluir' id='apagar_" + element.id + "'></td></tr>";
        });
        $("#tabela").children().last().append(registros);
        $.each($(".botao-excluir"),(index,elemento,nada)=>{
          $(elemento).on("click",(e)=>{
            apagar($(e.currentTarget).prop("id").substr(7));
          });
        });
      }
    }
  });
}

function apagar(id){
  console.log(id);
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: 'apagar.php',
    async: true,
    data: {identificador: id},
    success: function (response) {
      if(response){
        alert("Registro Deletado!");
        $("#tabela").children().last().children().remove();
        $('#nomePesquisado').val("").focus();
      } else{
        alert(response);
      }
    },
    error: function(e){
      alert("erro");
      console.log(e);
    }
  });
}