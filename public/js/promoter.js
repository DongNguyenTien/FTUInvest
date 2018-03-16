$('#add_group').click(function() {
    var role = $('input[name=temp_role]:checked').val();
    var group = $('#group option:selected');

    var role_name = "Staff";
    if (role == 1) {
        role_name = "Manager"
    }


    //Check new table
    var flag = checkNewTable(group.text(),role_name);
    if (flag === 1) {
        alert('This group is selected below');
        return false;
    }

    var html = '<tr class="tr_clone">'+
        '<td class="group">'+'<input type="hidden"  value="'+group.val()+'" name="group[]">'+ group.text()+'</td>'+
        '<td class="role">'+'<input type="hidden"  value="'+role+'" name="role[]">'+role_name+'</td>'+
        '<td>' +
        '<button type="button" class="btn btn-danger" onclick="return deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></button>' +
        '</td></tr>'

    ;
    $('#body_groups').prepend(html);



});

//Check new table
function checkNewTable(group_name,role_name)
{
    var flag = 0;
    //Check existed groups in new table
    $.each($('.group'), function(index,val) {
        console.log($($(this).parent().find('.role')).text(),role_name,$(this).text());
        if (($(this).text() === group_name) && ($($(this).parent().find('.role')).text() === role_name)) {
            flag = 1;
            return false;
        } else if (($(this).text() === group_name) && ($($(this).parent().find('.role')).text() !== role_name)) {
            $(this).parent().remove();
        }
    });

    return flag;

}



function deleteRow(_this){
    if(confirm('Do you want to delete this record?')){
        $(_this).closest('.tr_clone').remove();
    }
    else return false;
};

function beforeSubmit() {
    var html = $('#body_groups').html();
    $('#table_html').val(html);
    return true;
}


$(document).ready(function(){
    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_square-green',
        increaseArea: '20%' // optional
    });
});