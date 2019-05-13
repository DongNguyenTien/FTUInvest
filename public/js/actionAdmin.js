var datatable;
var _data = [];


$(document).ready(function() {
    getListOrder();
    datatable = $('#listCandicate').DataTable({
        data: _data,
        scrollX: true,
        scrollCollapse: true,
        columnDefs: [
            {
                width: 200,
                targets: 11
            },
            {
                width: 100,
                targets: 8
            },
            {
                width: 100,
                targets: 6
            },
            {
                width: 80,
                targets: 1
            },

        ],
        fixedColumns:   {
            leftColumns: 2
        }
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
            console.log(data);
            $('#listCandicate').waitMe('hide');
            // xu ly data
            data.forEach(function (m) {
                // if (m.CV !== null) {
                //     m.CV = '<a href="' + m.CV + '" target="_blank">Xem chi tiết</a>'
                // } else {
                //     m.CV = "<p>NULL</p>"
                // }
                //
                // if (m.facebook !== null) {
                //     m.facebook = '<a href="' + m.facebook + '" target="_blank">Xem trang</a>'
                // }
                //
                // m.dateOfBirth = moment(m.dateOfBirth).format("DD-MM-YYYY");

                /**
                 * Update 23/10/2018
                 */

                // m.sex = (m.sex === 1) ? "Nữ" : "Nam";
                // switch (m.status) {
                //     case 1 : {
                //         m.status = "Năm nhất"
                //     }
                //     case 2 : {
                //         m.status = "Năm 2"
                //     }
                //     case 3 : {
                //         m.status = "Năm 3"
                //     }
                //     case 4 : {
                //         m.status = "Năm 4"
                //     }
                //     // case 5 : {
                //     //     m.status = "Năm 5"
                //     // }
                //     case 5 : {
                //         m.status = "Đã đi làm"
                //     }
                // }
                //
                // switch (m.payment_type) {
                //     case 0 : {
                //         m.payment_type = "Offline (Bàn trực...)"
                //     }
                //     case 1 : {
                //         m.payment_type = "Online (Chuyển khoản...)"
                //     }
                // }
                //
                // switch (m.level) {
                //     case 1 : {
                //         m.level = "Chưa biết"
                //     }
                //     case 2 : {
                //         m.level = "Biết một vài kiến thức cơ bản"
                //     }
                //     case 3 : {
                //         m.level = "Kiến thức cơ bản ổn"
                //     }
                //     // default: m.level = '';
                //
                // }
                //
                // switch (m.is_sponsor) {
                //     case 1 : {
                //         m.is_sponsor = "Chưa"
                //     }
                //     case 2 : {
                //         m.is_sponsor = "Có đầu tư theo yêu thích"
                //     }
                //     case 3 : {
                //         m.is_sponsor = "Có đầu tư bài bản"
                //     }
                //     // default: m.is_sponsor = ''
                // }

                // if (m.is_have_friend === 1) {
                //     m.is_have_friend = '<i class="fa fa-icon fa-check-square-o "></i>'
                // } else {
                //     m.is_have_friend = '<i class="fa fa-icon fa-close "></i>'
                // }
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