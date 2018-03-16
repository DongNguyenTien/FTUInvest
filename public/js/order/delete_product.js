$(document).ready(function () {

    $('#choose_product').on('click', '.delete', function (e) {
        if(confirm('Do you want to delete this record')) {
            $(this).parents("tr").remove();
        }
    })
})