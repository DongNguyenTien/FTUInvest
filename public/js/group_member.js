$(function() {
    table = $('#group_table').DataTable({
            processing: true,
            serverSide: true,
            bAutoWidth: true,
            searching: false,
            ajax: {
                url: '/promoter/group/get',
            type: 'get',
            data: function (d) {
                d.name = $('#name').val();
            }
        },
        columns: [
        {data: 'id', sortable: false},
        {data: 'name'},
        {data: 'actions'}
    ],
        "language": {
        "sProcessing": '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
    },
});
});


function filter(){
    table.draw();
}

$('input').on('ifChecked', function(event){
    return filter();
});
$('input').on('ifUnchecked', function(event){
    return filter();
});


var group_member = (function(){
    return {
        create : function() {
            on();
            $.get('/promoter/group/create', null, function (result) {
                off();
                dialog.show('Add new group member', result);
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