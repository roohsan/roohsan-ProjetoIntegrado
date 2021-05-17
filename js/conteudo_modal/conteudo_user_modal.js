$('#edit_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // whaterever recebe dados do BD
  var nome = button.data('whatever_nome')
  var usuario = button.data('whatever_usuario')
  var id = button.data('whatever_id')
   // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body #enome').val(nome)
  modal.find('.modal-body #elogin').val(usuario)
  modal.find('.modal-body #id_Usuario').val(id)

})