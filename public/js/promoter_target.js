$('input').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
});

    $(function() {
        table = $('#promoter_table').DataTable({
            processing: true,
            serverSide: true,
            bAutoWidth: true,
            searching: false,
            ajax: {
                url: '/promoter/promoters/get',
                type: 'get',
                data: function (d) {
                    d.name = $('#name').val();
                    d.phone = $('#phone').val();
                    d.email = $('#email').val();
                    d.group = $('#group option:selected').val();
                    d.is_manager =$('#is_manager option:selected').val();
                    d.csrf = $('#_token').val();
                }
            },
            columns: [
                {data: 'id',name:'members.id'},
                {data: 'name',name:'members.name'},
                {data: 'phone',name:'members.phone'},
                {data: 'group', sortable: false},
                {data: 'email',name:'members.email', sortable: false},
                {data: 'address',name:'members.address'},
                {data: 'manager',sortable: false},
                {data: 'actions', sortable: false}
            ],
            "language": {
                "sProcessing": '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
            },
        });
    });
// Add event listener for opening and closing details
    $('#promoter_table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( template(row.data()) ).show();
            tr.addClass('shown');
        }
    });





function filter(){
    table.draw();
}


$('input').on( "keypress", function(event) {
    if (event.which == 13 && !event.shiftKey) {
        event.preventDefault();
        filter();
    }
});

$('input.amount').on('keyup',function(event){
    if (event.which >= 37 && event.which <= 40) return;
    this.value = this.value.replace(/\D/g, '')
        .replace(/\B(?=(\d{3})+(?!\d))/g, ',');
});

var target_sales = (function(){
    return {
        createModal : function(id) {
            on1();
            $.get('/promoter/target/'+id, null, function (result) {
                off();
                dialog.show('Change Sale target', result);
            })
        },
        edit : function(id) {
            on();
            $.get('/promoter/group/'+id+'/edit' ,null, function (result) {
                off();
                dialog.show('Update group member', result);
            })
        }
    }
})();





