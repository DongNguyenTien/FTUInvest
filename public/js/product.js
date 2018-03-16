var product = (function(){
    return {
        changeType : function(_this){
            if($(_this).val() == "news"){
                $('#typeContentNews').css('display', 'block');
                $('#typeContentOther').css('display', 'none');
            }else{
                $('#typeContentNews').css('display', 'none');
                $('#typeContentOther').css('display', 'block');
            }
        },
        addRowFile : function(_this,type){
            var add = "";
            if(type == "edit"){
                add = '<input type="hidden" name="link[]" value="0">';
            }
            var html = '<tr class="tr_clone">'+
                '<td>'+
                '<textarea class="form-control" name="caption[]" placeholder="Input caption name here..."></textarea>'+
                '</td>'+
                '<td style="width: 50%;">'+
                '<input type="file" class="form-control" name="file[]">'+
                '</td>'+
                '<td style="width: 10%;" class="text-center"><button type="button" onclick="return product.addRowFile(this,\''+type+'\');" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>'+
                '<td style="width: 10%;" class="text-center"><button type="button" onclick="return product.delRow(this);" class="btn btn-danger"><i class="fa fa-close"></i></button></td>'+
                add +
                '</td>'+
                '</tr>';


            if(_this == undefined){
                $('#body_files').prepend(html);
            }else{
                $(_this).parent().parent().before(html);
            }

        },
        delRow : function (_this) {
            if(confirm('Do you want to delete this record?')){
                $(_this).closest('.tr_clone').remove();
            }
            else return false;
        }
    };
})();

// function RemoveRougeChar(convertString){
//
//
//     if(convertString.substring(0,1) == ","){
//
//         return convertString.substring(1, convertString.length)
//
//     }
//     return convertString;
//
// }
//
// $(document).ready(function(){
//     $('input.price').keyup(function(event){
//         // skip for arrow keys
//         if(event.which >= 37 && event.which <= 40){
//             event.preventDefault();
//         }
//         var $this = $(this);
//         var num = $this.val().replace(/,/gi, "").split("").reverse().join("");
//
//         var num2 = RemoveRougeChar(num.replace(/(.{3})/g,"$1,").split("").reverse().join(""));
//         // the following line has been simplified. Revision history contains original.
//         $this.val(num2);
//     });
// });