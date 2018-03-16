

$(function() {
    table = $('#listOrder').DataTable({
        processing: true,
        serverSide: true,
        bAutoWidth: true,
        searching: false,
        ajax: {
            url: '/order/get',
            type: 'get',
            data: function (d) {
                d.order_status = $('#order_status option:selected').val();
                d.time = $('#time').val();
                d.member_id = $('#member_id option:selected').val();
                d.created_id = $('#created_id').val();
                d.csrf = $('#_token').val();
            }
        },
        columns: [
            {data: 'id'},
            {data: 'customer_id'},
            {data: 'creator', sortable: false},
            {data: 'money'},
            {data: 'order_status', sortable: false},
            {data: 'payment_status'},
            {data: 'created_at',sortable: false},
            {data: 'actions'}
        ],
        "language": {
            "sProcessing": '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
        },
    });
});

$(function () {
    $('#time').datetimepicker({
        format: "DD-MM-YYYY",
    });
});
$(document).ready(function(){
    $('.input-group-addon').click(function(){
        $('#time').datetimepicker("show","format:\"DD-MM-YYYY\"");
    });
});

$('input').on( "keypress", function(event) {
    if (event.which == 13 && !event.shiftKey) {
        event.preventDefault();
        filter();
    }
});

$('input#datetimepicker1').change(function(){
    return filter();
})


function filter(_this){
    var current_id = $(_this).attr('id');
    console.log(current_id);
    if (current_id === 'member_id') {
        $('#created_id option[value="0"]').attr('selected', 'selected');
        $('#select2-created_id-container').text('All member');
    } else {
        $('#member_id option[value="0"]').attr('selected', 'selected');
        $('#select2-member_id-container').text('All member');
    }
    table.draw();
}
