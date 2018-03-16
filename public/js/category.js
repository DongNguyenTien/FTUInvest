


$(function() {
    table = $('#product_category_table').DataTable({
        processing: true,
        serverSide: true,
        bAutoWidth: true,
        searching: false,
        ajax: {
            url: 'category/get',
            type: 'get',
            data: function (d) {
                d.key = $('#key').val();
            }
        },
        columns: [
            {data: 'id', sortable: false},
            {data: 'name'}
        ],
        "language": {
            "sProcessing": '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
        },
    });
});



function filter(){
    table.draw();
}