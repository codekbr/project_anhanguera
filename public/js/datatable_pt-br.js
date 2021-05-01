(function($, DataTable) {
    // Datatable global configuration
    $.extend(true, DataTable.defaults, {
        language: {
            emptyTable: "Nenhum registro encontrado",
            info: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 até 0 de 0 registros",
            infoFiltered: "(Filtrados de _MAX_ registros)",
            infoThousands: ".",
            lengthMenu: "_MENU_ Resultados por página",
            loadingRecords: "Carregando...",
            processing: "Processando...",
            zeroRecords: "Nenhum registro encontrado",
            search: "Pesquisar",
            paginate: {
                next: "Próximo",
                previous: "Anterior",
                first: "Primeiro",
                last: "Último"
            },
            aria: {
                sortAscending: ": Ordenar colunas de forma ascendente",
                sortDescending: ": Ordenar colunas de forma descendente"
            },
            select: {
                rows: {
                    _: "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            },
            buttons: {
                copy: "Copiar para a área de transferência",
                copyTitle: "Cópia bem sucedida",
                copySuccess: {
                    "1": "Uma linha copiada com sucesso",
                    _: "%d linhas copiadas com sucesso"
                }
            }
        }
    });
})(jQuery, jQuery.fn.dataTable);
var defaults = {
    pageLength: 10,
    order: [0, "desc"],
    autoWidth: false,
    stateSave: false,
    columnDefs: [
        { targets: [0, 1, 2, 4, 5, 6, 7, 8, 9, 10], width: "5px" },
        { targets: [3], width: "800px" }
    ],
    responsive:true,
    language: {
        info: "<strong>Mostrando _START_ a _END_ de _TOTAL_ registros</strong>",
        search: "<strong>Busca: </strong>",
        paginate: {
            next: '<i class="zmdi zmdi-chevron-right"></i>',
            previous: '<i class="zmdi zmdi-chevron-left"></i>'
        },
        lengthMenu:
            'Mostrar <select class="form-control input-sm">' +
            '<option selected value="10">10</option>' +
            '<option value="20">20</option>' +
            '<option value="30">30</option>' +
            '<option value="-1">Todos</option>' +
            "</select>"
    }
};
