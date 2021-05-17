$('#edit_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // whaterever recebe dados do BD
  var rua = button.data('whatever_rua')
  var nivel = button.data('whatever_nivel')
  var id_endereco = button.data('whatever_id')
  var sequencia = button.data('whatever_sequencia')
   // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body #erua').val(rua)
  modal.find('.modal-body #enivel').val(nivel)
  modal.find('.modal-body #esequencia').val(sequencia)
  modal.find('.modal-body #id_endereco').val(id_endereco)

})