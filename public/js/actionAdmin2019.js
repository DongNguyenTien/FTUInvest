var datatable;
var _data = [];


$(document).ready(function() {
    getListOrder();
    datatable = $('#listCandicate').DataTable({
        data: _data,
        scrollX: true,
        scrollCollapse: true,
        // columnDefs: [
        //     {
        //         width: 200,
        //         targets: 11
        //     },
        //     {
        //         width: 100,
        //         targets: 8
        //     },
        //     {
        //         width: 100,
        //         targets: 6
        //     },
        //     {
        //         width: 80,
        //         targets: 1
        //     },
        //
        // ],
        // fixedColumns:   {
        //     leftColumns: 2
        // }
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
                m.dateOfBirth = moment(m.dateOfBirth).format("DD-MM-YYYY");

                // if (m.facebook !== null) {
                //     m.facebook = '<a href="' + m.facebook + '" target="_blank">Xem trang</a>'
                // }
                // switch (m.location) {
                //     case 0 : {
                //         m.location = ""
                //     }
                //     case 1 : {
                //         m.location = "Đại học Kinh tế Quốc dân"
                //     }
                //     case 2 : {
                //         m.location = "Đại học Ngoại thương"
                //     }
                // }
                //
                // switch (m.shift) {
                //     case 0 : {
                //         m.shift = "Ca 1: 8h00 - 9h30"
                //     }
                //     case 1 : {
                //         m.shift = "Ca 2: 10h00 - 11h30"
                //     }
                //     case 2 : {
                //         m.shift = "Ca 3: 14h00 - 15h30"
                //     }
                //     case 3 : {
                //         m.shift = "Ca 4: 16h00 - 17h30"
                //     }
                //
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
                    off();
                    $('.change-password').modal('hide');
                    alert('Đổi mật khẩu thành công')
                } else {
                    alert('Đổi mật khẩu thất bại')

                }
            }
        });
    }

    return false;
}