$('#edit_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // whaterever recebe dados do BD
  var nome = button.data('whatever_nome')
  var nomecurto = button.data('whatever_nomecurto')
  var id = button.data('whatever_id')
  var codigo = button.data('whatever_codigo')
  var qtd = button.data('whatever_qtd')
  var unidade = button.data('whatever_unidade')
  var tipo = button.data('whatever_tipo')
   // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body #enomeproduto').val(nome)
  modal.find('.modal-body #enomecurto').val(nomecurto)
  modal.find('.modal-body #ecodigo').val(codigo)
  modal.find('.modal-body #idproduto').val(id)
  modal.find('.modal-body #eqtd').val(qtd)
  modal.find('.modal-body #eunidade').val(unidade)
  modal.find('.modal-body #etipo').val(tipo)
})