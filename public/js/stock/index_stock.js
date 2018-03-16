$(function() {
    table = $('#stock_table').DataTable({
            processing: true,
            serverSide: true,
            bAutoWidth: true,
            searching: false,
            ajax: {
                url: '/stock/get',
            type: 'get',
            data: function (d) {
                d.name = $('#name').val();
                d.address = $('#address').val();
                d.phone = $('#phone').val();
                // d.province = $('#province option:selected').val();
                // d.district =$('#district option:selected').val();
                // d.ward = $('#ward option:selected').val();
            }
        },
        columns: [
        {data: 'id'},
        {data: 'name', name: 'members.name'},
            {data:'phone'},
        {data: 'address'},
        {data: 'actions', sortable: false}
    ],
        "language": {
        "sProcessing": '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
    },
});
});


function filter(){
    table.draw();
}

//Alert successfully index
if (typeof sessionStorage.message !== 'undefined') {
    var html = '<div class="alert alert-success alert-dismissible">'+
        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
        '<h4><i class="icon fa fa-check"></i>Alert</h4>'+
    sessionStorage.message + '</div>';
    sessionStorage.clear();

    $('#alert').append(html);
}



// Enter
$('input').on( "keypress", function(event) {
    if (event.which == 13 && !event.shiftKey) {
        event.preventDefault();
        filter();
    }
});

$(document).ready(function() {

})




