$(function() {
    $('.select2').select2();
    $('.select2-full-width').select2({ width: '100%' });
});

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function showNotify(message, type)
{
    if (type == undefined || type == '') {
        type = 'success';
    }

    $.notify(message, type, {position: 'top center'});
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}



var dialog = (function(){
    return {
        show : function(title, data){
            $('#finishModalLabel').html(title);
            $('#modal_content').html(data);
            $('#btnAction').attr('onclick', 'return formHelper.onSubmit("frmDialogCreate")');
            $('#detailModal').modal('show');
        },
        close: function () {
            $('#detailModal').modal('hide');
            $('#detailModal').css('display', 'none').attr('aria-hidden', 'true');
            $('#finishModalLabel').html('');
            $('#modal_content').html('');
        },
    }
})();

var projectHelper = (function(){
    return {
        create : function () {
            on();
            $.get('/utilities/project/create', null, function (result) {
                off();
                dialog.show('Thêm mới dự án', result);
            })
        },
        edit : function (id) {
            on();
            $.get('/utilities/project/edit/'+id ,null, function (result) {
                    off();
                    dialog.show('Cập nhật thông tin dự án', result);
                })
        },

        editdecentralization : function (id) {
            on()
            $.get('/utilities/project/editdecentralization/'+id ,null, function (result) {
                off();
                dialog.show('Cập nhật phân quyền dự án', result);
            })
        }
    };
})();

var checkDeleteRegion = (function(){
    return {
        delete: function(id){
            on();
            $.get({
                url: '/news/news_region/checkDelete',
                type: 'GET',
                data: {
                    id: id
                },
                success: function(result){
                    off();
                    console.log(result);
                    dialog.show('Notice',result)
                }
            })

        }
    }
})();

var BlockHelper = (function(){
    return {
        detail: function(id){
            on();
            $.get('/news/news_block/detail/'+id, null, function(result){
                off();
                dialog.show('View block content',result);
            });
        }
    }
})();


var regionHelper = (function(){
    return {
        create: function(){
            on();
            $.get('/news/news_region/create', null, function (result) {
                off();
                dialog.show('Add new region', result);
            })
        },
        edit : function (id) {
            on();
            $.get('/news/news_region/edit/'+id ,null, function (result) {
                off();
                dialog.show('Update region', result);
            })
        }
    }

})();

var formHelper = (function () {
    return {
        postFormJson: function (objID, onSucess) {
            var url = document.getElementById(objID).action;
            $.post(url, $('#' + objID).serialize(), function (data) {
                onSucess(data);
            }, 'json');
        }
    };
})();

var btn_loading = (function () {
    return {
        loading : function (btn_id) {
            var $btn = $('#' + btn_id);
            $btn.prop('disabled', true);
            $btn.waitMe({
                color: '#3c8dbc'
            });
        },
        hide : function (btn_id) {
            var $btn = $('#' + btn_id);
            $btn.prop('disabled', false);
            $btn.waitMe('hide');
        }
    };
})();


function showModal(modalContent) {
    // Create modal element
    var date = new Date();
    var id = date.getTime();

    var $modal = $('<div class="modal fade" id="modal-'+ id +'" tabindex="-1" role="dialog" aria-labelledby="modal-'+ id +'"></div>');
    $modal.html(modalContent);
    $('body').append($modal);
    $modal.modal('show');
}

function on() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("loading").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}

function on1() {
    document.getElementById("overlay").style.display = "block";
}

