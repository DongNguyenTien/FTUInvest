$(function () {
    $('.datetimepicker').datetimepicker({
        format: "DD-MM-YYYY",
    });

});

$(document).ready(function(){
    $('.input-group-addon').click(function(){
        $('.datetimepicker').datetimepicker("show","format:\"DD-MM-YYYY\"");
    });
});



//Submit button
$('#button-submit').click(function() {
    on1();
    var id = $('#stock').val();

    //Initial
    var product = [];
    var quantity = [];
    var type = [];
    var note_text = [];
    var date = [];

    $.each($('td.product > input'),function(index,val) {
         var product_id = $(this).val();
         product.push(product_id) ;
    });
    $.each($('td.quantity > input'),function(index,val) {
        var value = $(this).val();
        quantity.push(value) ;
    });

    $.each($( "input[name^='note']" ),function(index,val) {
        var value = $(this).val();
        type.push(value) ;
    });

    $.each($( "input[name^='text']" ),function(index,val) {
        var value = $(this).val();
        note_text.push(value) ;
    });

    $.each($( "input[name^='date']" ),function(index,val) {
        var value = $(this).val();
        date.push(value) ;
    });

    console.log(quantity,product,type,note_text,date);
    //Validate
    var flag = 0
    if (product.length == 0) {
        alert('nothing change');
        off();
        return false;
    }
    else if ((product.length !== quantity.length) || (product.length !== type.length) || (product.length !== note_text.length) || (product.length !== date.length)){
        alert('something wrong in table');
        off();
        return false;
    }





    $.ajax({
        url: '/stock/update/'+id,
        type: 'POST',
        data: {
            product: product,
            quantity: quantity,
            type: type,
            note: note_text,
            date: date,
        },
        success: function(data) {

            if(data['status'] == 0) {
                alert(data['message']);
                off();
                return false;
            } else if(data['status'] == 1) {
                sessionStorage.message = 'You have made a successful transaction';
                window.location.href = '/stock/index';
            } else {
                alert('Something wrong when save date')
                off();
                return false;
            }
        }
    })
});

//Check new table
function checkNewTable(type,product_now,type_text,quantity)
{
    var flag = 0;

    //Check existed products
    var existed_quantity = 0;
    quantity = parseInt(quantity);
    //if use, loss, discard, sale, inventory - , transfer from current stock
    if(type.val() != 6) {
        $.ajax({
            url: '/stock/checkquantity',
            type: 'GET',
            data: {
                product_id: $('#product option:selected').val(),
                stock_id: $('#stock').val(),
            },
            async: false,
            success: function (data) {
                if (data == -1) {
                    alert('Something wrong in checking existed product');
                    flag = 1;
                    return false;
                }
                else {
                    //old - new
                    existed_quantity =  parseInt(data) - parseInt(quantity);
                }
            }

        });
    }



    //Check server return true type
    if(flag == 1) {
        return false;
    }


    //Check if add new row, product quantity must be > 0
    if(type.val() != 6) {
        $.each($('.product'),function(index,val){
            if ($(this).text() === product_now.text()) {
                var type_row = $($(this).parent().find('input.note')).val();
                var current_type_text = $($(this).parent().find('td.note')).text();
                //Check to string to know transfer and inventory



                //If use, discard, loss, sale,
                if ((type_row == 0) || (type_row == 1) || (type_row == 3) || (type_row == 4) ) {

                    existed_quantity -= parseInt($($(this).parent().find('.quantity')).text());
                }

                //If receive
                else if (type_row == 6) {
                    existed_quantity += parseInt($($(this).parent().find('.quantity')).text());
                }
                //If transfer,
                else if (type_row == 5) {
                    existed_quantity -= parseInt($($(this).parent().find('.quantity')).text());
                }
                //If inventory
            }
        });
    }


    // Check quantity after modify
    if(existed_quantity < 0) {
        alert('quantity modify < 0');
        flag = 1;
        return false;
    }

    //If satisfy condition quantity => change table
    //Check current products

    $.each($('.product'), function(index,val) {
        var type_row = $($(this).parent().find('input.note')).val();
        var current_type_text = $($(this).parent().find('td.note')).text();

        if(($(this).text() === product_now.text()) && (current_type_text === type_text)) {
            //
            // //If type = loss,discard,use
            // if ((type.val() == 0) || (type.val() == 1) || (type.val() == 3)) {
            //     var current_quantity = parseInt($($(this).parent().find('.quantity')).text());
            //     var after_quantity = existed_quantity - current_quantity;
            //
            //     //quantity < 0
            //     if(after_quantity < 0) {
            //         flag_check = 1;
            //         return false
            //     }
            //     else {
            //         if ($($(this).parent().find('.note')).text() === type_text) {
            quantity += parseInt($($(this).parent().find('.quantity')).text());
            $(this).closest('.tr_clone').remove();
        }
            //     }
            // }
            //If type = Receipt
            // else if ((type.val() == 6)) {
            //     quantity = parseInt($(this).parent().find('.quantity').text()) + parseInt(quantity);
            //     if ($($(this).parent().find('.note')).text() === type_text) {
            //         $(this).closest('.tr_clone').remove();
            //     }
            // }
        // }
    });

    //Append html content

    var html = appendHtml(type_text,quantity,type,product_now);

    $('#new_products').prepend(html);









}

function checkTemporaryNewTable(product_now, type_text,quantity,type,date) {
    quantity = parseInt(quantity);
    $.each($('.product'), function(index,val) {
        var type_row = $($(this).parent().find('input.note')).val();
        var current_type_text = $($(this).parent().find('td.note')).text();

        if(($(this).text() === product_now.text()) && (current_type_text === type_text)) {

            quantity += parseInt($($(this).parent().find('.quantity')).text());
            $(this).closest('.tr_clone').remove();
        }

    });

    //Append html content
    var html = appendHtml(type_text,quantity,type,product_now,date);

    $('#new_products').prepend(html);

}

//When action = discard, loss, use, receipt
$('#add_product').click(function()
{
    var quantity = $('#quantity').val();
    var date = $('#date-1').val();
    console.log(date);
    //Identify type
    var type = $('#action option:selected');


    //Function to iden0tify type_text (use in inventory and transfer)
    var type_text = type.text();
    // if(typeof type === undefined) {
    //     type_text = "Add"
    // }
    // else if (type.val() == 5){
    //     if($('#transfer-from option:selected').val() == $('#transfer-to option:selected').val()){
    //         alert('Error: same stock');
    //         return false;
    //     }
    //     type_text =$('#transfer-from option:selected').text() +' '+type.text()+ ' '+$('#transfer-to').text();
    // }
    // else {
    //     type_text = type.text();
    // }


    //Identify quantity
    if(quantity > 0) {
        var flag_quantity = 0;
        var product_now = $('#product option:selected');
        var old_quantity = 0;

        // function ajax() {
        //     return $.ajax({
        //         url: '/stock/checkquantity',
        //         type: 'GET',
        //         data: {
        //             product_id: $('#product option:selected').val(),
        //             stock_id: $('#stock').val(),
        //         },
        //         success: function(data){
        //             if(data.length > 0) {
        //                 old_quantity = data;
        //                 console.log(data);
        //             }
        //         }
        //     })
        // }

        // //Check ajax before
        // $.when(ajax()).done(function(){
        //     if(old_quantity == -1) {
        //         alert('Something wrong');
        //         flag_quantity = 1;
        //     }
        //     else {
        //
        //     }
        // });
        // if (flag_quantity == 1) {
        //    return false;
        // }


        //Check exist product
        // var flag = checkNewTable(type,product_now,type_text,quantity);
        // $.each($('.product'), function(index,val) {
        //     if($(this).text() === product_now){
        //         //If type = loss,discard,use
        //         if ((type.val() == 0)||(type.val() == 1)||(type.val() == 3)) {
        //             quantity = parseInt($(this).parent().find('.quantity').text()) + parseInt(old_quantity) - parseInt(quantity);
        //             if (quantity < 0) {
        //                 alert('quantity < 0');
        //                 flag = 1;
        //                 return false;
        //             }
        //         }
        //         //If type = Receipt
        //         else if((type.val() == 6)) {
        //             quantity = parseInt($(this).parent().find('.quantity').text()) + parseInt(quantity);
        //         }
        //
        //         $(this).closest('.tr_clone').remove();
        //
        //
        //     }
        // });

        checkTemporaryNewTable(product_now,type_text,quantity,type,date)






    }
    else {
        alert('quantity must > 0')
    }

});

//When action = transfer
$('#transfer_product').click(function() {
    var quantity = $('#quantity-transfer').val();

    if(quantity > 0) {
        //Identify type and new add product
        var type = $('#action option:selected');


        var current_product = $('#product-transfer option:selected');
        var stock_1_id = $('#transfer-from-id').val();
        var stock_1_name = $('#transfer-from-name').val();
        var stock_2 = $('#transfer-to option:selected')

        var type_text = stock_1_name +'___'+ type.text() + ' to___' + stock_2.text()+':'+stock_2.val();


        // //ajax check product in select stock
        // //get info stock from
        // var stock_from = stock_1_id;
        //
        //
        // var flag = 0;
        // $.ajax({
        //     url : '/stock/checkProduct',
        //     type: 'GET',
        //     data:  {
        //         stock_id : stock_from,
        //         product_id : $('#product-transfer option:selected').val(),
        //         quantity : $('#quantity-transfer').val(),
        //     },
        //     async: false,
        //     success : function(data) {
        //         if (parseInt(data) == 0) {
        //             alert('Not enough product '+ current_product.text() +' in stock '+ stock_1_name + ' to transfer to ' + stock_2.text());
        //             flag = 1;
        //             return false;
        //         }
        //
        //     }
        //
        // });
        //
        // if (flag == 1) {
        //     return false;
        // }

        // //If transfer from current stock => check new table
        // if($('#stock').val() == stock_1_id) {
        //     var flag_check_new_table = checkNewTable(type,current_product,type_text,quantity);
        //     //Identify quantity
        //     // console.log(quantity);
        //     // if(quantity > 0) {
        //     //     var product_now = $('#product option:selected').text();
        //     //
        //     //     //Check exist product
        //     //     var flag = 0;
        //     //     $.each($('.product'), function(index,val) {
        //     //         if($(this).text() === product_now){
        //     //             //If type = loss,discard,use
        //     //             if (type.val() == 5) {
        //     //                 quantity = parseInt($(this).parent().find('.quantity').text()) + parseInt(quantity);
        //     //
        //     //             }
        //     //             $(this).closest('.tr_clone').remove();
        //     //         }
        //     //     });
        //     //
        //     //     if(flag == 1) {
        //     //         return false;
        //     //     }
        //     //
        //     //     //Append html content
        //     //     var html = appendHtml(type_text,quantity);
        //     //
        //     //     $('#new_products').prepend(html);
        // }

        //Append html content
        checkTemporaryNewTable(current_product,type_text,quantity,type)

    }


    else {
        alert('quantity must > 0')
    }
});

//When action = return, sales
$('#return_product').on('click',function() {
    on1();
    var quantity = $('#quantity-return').val();
    var type = $('#action option:selected');
    var type_text = type.text() + '___order:' + $('#order_id').val();
    var product_now = $('#product-return option:selected');

    if(quantity > 0) {
        //Check product in order id
        var flag_checkOrder = 0;

        $.ajax({
            url: '/stock/checkOrder',
            type: 'GET',
            data: {
                order_id: $('#order_id').val(),
                product_id: product_now.val(),
                quantity: $('#quantity-return').val(),
            },
            async: false,
            success: function(data) {
                off();
                if(parseInt(data) != 1) {
                    alert('Not enough product' + product_now.text() + 'in order ' + $('#order_id').val())
                    flag_checkOrder = 1;
                    return false;
                }
            }
        });

        if (flag_checkOrder == 1) {
            return false;
        }

        //Append html content
        checkTemporaryNewTable(product_now,type_text,quantity,type)


    }
    else {
        alert('quantity select must be > 0');
    }

    off();
})

//When action = inventory
$('#inventory_product-plus').click(function() {
    var quantity = $('#quantity-inventory').val();
    if(quantity > 0) {
        var type = $('#action option:selected');
        var type_val = parseInt(type.val()) + 1;
        var type_text = type.text() + '___plus___' + $('#note-inventory').val();

        var product = $('#product-inventory option:selected');


        //Append html content
        quantity = parseInt(quantity);
        $.each($('.product'), function(index,val) {
            var type_row = $($(this).parent().find('input.note')).val();
            var current_type_text = $($(this).parent().find('td.note')).text();

            if(($(this).text() === product.text()) && (current_type_text === type_text)) {

                quantity += parseInt($($(this).parent().find('.quantity')).text());
                $(this).closest('.tr_clone').remove();
            }

        });

        var html = '<tr class="tr_clone">'+
            '<td class="product">'+'<input style="display:none"  value="'+product.val()+'" name="product[]">'+ product.text()+'</td>'+
            '<td class="quantity">'+'<input class="edit-quantity" style="display:none"  value="'+quantity+'" name="quantity[]">'+ quantity+'</td>'+
            '<td class="note"><input name="note[]" class="note" style="display: none" value="'+type_val+'">' +
            '<input name="text[]" class="note" style="display: none" value="'+type_text+'">'+type_text+'</td>'+
            '<td>' +
            // '<button type="button"  class="btn btn-warning edit_product" style="margin-right: 5px" onclick="return editRow(this)"><i class="fa fa-pencil"></i></button>' +
            '<button type="button" class="btn btn-danger" onclick="return deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></button>' +
            '</td></tr>';

        $('#new_products').prepend(html);
    }
    else {
        alert('product selected must be > 0');
    }


});

$('#inventory_product-minus').click(function() {
    var quantity = $('#quantity-inventory').val();
    if(quantity > 0) {
        var type = $('#action option:selected');
        var type_text = type.text() + '___minus___' + $('#note-inventory').val();

        var product = $('#product-inventory option:selected');

        //Append html content
        checkTemporaryNewTable(product,type_text,quantity,type)

    }
    else {
        alert('product selected must be > 0');
    }

});


function changeCategory(_this) {
    var data = $(_this).val();
    var type = "category";
    var product = $($(_this).closest('.tr_clone')).find('.product-table');
    product = $(product).attr('id');
    console.log(product);


    $('#button-submit').attr('disabled',true);
     $.ajax({
            beforeSend: function () {
                $('.product-wait').waitMe({
                    effect : 'bouncePulse',
                    text : '',
                    bg : 'rgba(255,255,255,0.7)',
                    color : '#000'
                });
            },
            url: '/stock/place-ajax',
            data: {
                data: data,
                type: type
            },
            type: 'GET',
            success: function (data) {
                $('.product-wait').waitMe('hide');
                $('#button-submit').attr('disabled',false)
                $('#'+product).empty();
                $.each(data, function (index, val) {
                    $('#'+product).append('<option value="' + val.id + '">' + val.name + '</option>')
                })

            }
        });


}

//Delete specific row
function deleteRow(_this)
{
    if(confirm('Do you want to delete this record?')){
        $(_this).closest('.tr_clone').remove();
    }
    else return false;
};

//Event when click button edit in each row
function editRow(_this)
{
    console.log($(_this).closest('.tr_clone').find('.edit-quantity'));
    var input = $(_this).closest('.tr_clone').find('.edit-quantity');

    var quantity = $(input).val();
    console.log(input,quantity);
    var html = '<td class="quantity">'+'<div class="input-group input-group-sm" style="width: 50%; margin: auto"><input class="confirm-edit form-control"  id="confirm" type="number" min="1" step="1" value="'+quantity+'" name="quantity[]">'+
        '<span class="input-group-btn"><button class="btn btn-success" type="button" onclick="return confirmEdit(this)">Confirm</button></td>';
    $(input).parent().replaceWith(html)
}


//Confirm button when edit row on table list product
function confirmEdit(_this)
{
    var quantity = $(_this).closest('td').find('.confirm-edit').val();
    var html = '<td class="quantity">'+'<input class="edit-quantity" style="display:none" value="'+quantity+'" name="quantity[]">'+ quantity+'</td>';

    $(_this).closest('td').replaceWith(html)
}


//Select action  => show different table action
function showAction(_this)
{
    var action = $(_this).closest('.choose-action').find('#action').val();
    if (action == 5) {
        $('table#transfer-table').css('display','table');
        $('table#RLUD-table').css('display','none');
        $('table#return-table').css('display','none');
        $('table#inventory-table').css('display','none')
    }
    else if ((action == 4)||(action == 2)){
        $('table#return-table').css('display','table');
        $('table#RLUD-table').css('display','none');
        $('table#transfer-table').css('display','none');
        $('table#inventory-table').css('display','none');
    }
    else if (action == 7) {
        $('table#inventory-table').css('display','table');
        $('table#RLUD-table').css('display','none');
        $('table#transfer-table').css('display','none');
        $('table#return-table').css('display','none');
    }

    else {
        $('table#RLUD-table').css('display','table');
        $('table#return-table').css('display','none');
        $('table#transfer-table').css('display','none');
        $('table#inventory-table').css('display','none');
    }


}

function appendHtml(type_text,quantity,type,product,date)
{
    var html = '<tr class="tr_clone">'+
        '<td class="product">'+'<input style="display:none"  value="'+product.val()+'" name="product[]">'+ product.text()+'</td>'+
        '<td class="quantity">'+'<input class="edit-quantity" style="display:none"  value="'+quantity+'" name="quantity[]">'+ quantity+'</td>'+
        '<td class="note"><input name="note[]" class="note" style="display: none" value="'+type.val()+'">' +
        '<input name="text[]" class="note" style="display: none" value="'+type_text+'">'+type_text+'</td>'+
        '<td class="date"><input name="date[]" class="note" style="display: none" value="'+date+'">'+date+'</td>' +
        '<td>' +
        // '<button type="button"  class="btn btn-warning edit_product" style="margin-right: 5px" onclick="return editRow(this)"><i class="fa fa-pencil"></i></button>' +
        '<button type="button" class="btn btn-danger" onclick="return deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></button>' +
        '</td></tr>';

    return html;
}

function paginationProducts(_this)
{
    var page = $(_this).val();
    $.ajax({
        beforeSend: function () {
            $('#oldProductsContent').waitMe({
                effect : 'bounce',
                text : '',
                bg : 'rgba(255,255,255,0.7)',
                color : '#000'
            });
        },
        url: '/stock/pagination',
        type: 'GET',
        data: {
            stock_id: $(_this).attr('stock'),
            page: page
        },
        success: function(data) {
            console.log(data);
            $('#oldProductsContent').waitMe('hide');
            if (data.length > 0) {
                var html = '<tbody id="body_products">';
               for(var i=0; i<data.length; i++) {
                   var subhtml = '<tr class="tr_clone"><td>'+'<input style="display:none"  value="'+data[i]['product_id']+'" >'+ data[i]['product']['name'] +'</td>'+
                       '<td>'+'<input  style="display:none"  value="'+ data[i]['quantity'] +'" >'+ data[i]['quantity'] +'</td>'+
                       '<td><input style="display: none" >Existed</td></tr>'
                   html += subhtml;
               }

               html += '</tbody>';
               $('#body_products').replaceWith(html);

               $('button.pagination-page').each(function(){
                  if($(this).val() == page) {
                      $(this).css('background-color','lightskyblue')
                  }
                  else {
                      $(this).css('background-color','')
                  }
               });


            }
        }
    })
}

