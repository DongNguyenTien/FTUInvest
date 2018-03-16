
$(function() {
    table = $('#category_table').DataTable({
        processing: true,
        serverSide: true,
        order: [ 0, "desc" ],
        bAutoWidth: true,
        searching: true,
        ajax: {
            url: '/notification/get',
            type: 'get',
            data: function (d) {
                // d.category = $('#category option:selected').val();
                // d.checkHasChildren =$('input#checkHasChildren:checked').val();
            }
        },
        columns: [
            // Tên các cột truy vấn được (ở đây là cột title, id, content từ DB và cột actions được render thêm
            // Các dữ liệu này được lấy ra từ Controller, trả về kiểu json
            {data: 'id', sortable: false, name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'content', name: 'content'},
            // {data: 'type', name:'type',
            //     render: function ( data, type, row ) {
            //         switch (data) {
            //             case 1: return 'All system';
            //             case 2: return 'Hanoi branch';
            //             case 3: return 'TPHCM branch';
            //         }
            //     }
            // },
            {data: 'schedule_time', name: 'schedule_time'},
            {data: 'actions', name: 'actions'}
        ],
        "language": {
        //     "lengthMenu": "Hiển thị _MENU_ bản ghi trên một trang",
        //     "zeroRecords": "Không tìm bản ghi phù hợp",
        //     "info": "Đang hiển thị trang _PAGE_ of _PAGES_",
        //     "infoEmpty": "Không có dữ liệu",
        //     "infoFiltered": "(lọc từ tổng số _MAX_ bản ghi)",
        //     "info": "Hiển thị từ _START_ đến _END_ trong tổng số _TOTAL_ kết quả",
        //     "paginate": {
        //         "first":      "Đầu tiên",
        //         "last":       "Cuối cùng",
        //         "next":       "Sau",
        //         "previous":   "Trước"
        //     },
            "sProcessing": '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
        },
    });
});
function filter(){
    table.draw();
}