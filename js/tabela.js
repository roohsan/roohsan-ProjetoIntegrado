$(document).ready( function () {
    $('#tabela_user').DataTable({ "language": {
		            "lengthMenu": "Mostrando _MENU_ Registro por paginas",
		            "zeroRecords": "Registro não encontrado",
		            "info": "Mostrando Paginas _PAGE_ de _PAGES_",
		            "infoEmpty": "Nenhum registro encontrado",
		            "infoFiltered": "(filtrado de _MAX_ registro no total)",
		            "sSearch": "Pesquisar",
		             "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
		        }
		    });
} );