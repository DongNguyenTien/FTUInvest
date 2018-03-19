var datatable;
var _data = [];


$(document).ready(function() {
    getListOrder();
    datatable = $('#listCandicate').DataTable({
        data: _data
    });
});

function getListOrder() {
    if (datatable)
        datatable.clear().draw();
    $.ajax({
        url: '/ajax/member',
        beforeSend: function () {
            $('#listCandicate').waitMe({
                effect: 'bounce',
                text: '',
                bg: 'rgba(255,255,255,0.7)',
                color: '#000'
            });
        },
        success: function (data) {
            $('#listCandicate').waitMe('hide');
            // xu ly data
            data.forEach(function (m) {
                if (m.CV !== null) {
                    m.CV = '<a href="' + m.CV + '" target="_blank">Xem chi tiết</a>'
                } else {
                    m.CV = "<p>NULL</p>"
                }

                if (m.facebook !== null) {
                    m.facebook = '<a href="' + m.facebook + '" target="_blank">Xem trang</a>'
                }

                m.dateOfBirth = moment(m.dateOfBirth).format("DD-MM-YYYY");
                _data.push(Object.values(m));
            });


            datatable.rows.add(_data); // Add data to datatable, array
            datatable.columns.adjust().draw(); // Redraw the DataTable
            datatable.order([0, 'desc']).draw();

            _data.length = 0;
        }
    });
}

function changePassword() {
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    if (password !== confirm_password) {
        $('input[type=password]').effect( "bounce" );
        $('input[type=password]').css('border','1px solid red');
    } else {
        on();
        $.ajax({
            url: '/ajax/changePassword',
            method: 'post',
            data :{
                new_password : password
            },
            success: function(data) {
                if (data['success'] === 1) {
                    $('#modal').modal('hide');
                    alert('Đổi mật khảu thành công')
                } else {
                    alert('Đổi mật khảu thất bại')

                }
            }
        });
    }

    return false;
}