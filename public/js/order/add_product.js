$(document).ready(function () {
    $('#add_product').click(function (event) {
        number = $('#quantity').val();
        cate = $('#cate_product').select2('data')[0].text;
        test = $('#products1').select2('data');
        text = test[0].text;
        value = $('#products1').val();
        event.preventDefault();

        if(number > 0) {
            products = document.getElementsByClassName('product_items');

            // Check xem co phan tu nao trung hay khong
            check = 0;
            for (i = 0; i < products.length; i++) {
                current_product = products[i].innerHTML;
                if (current_product === text) {
                    newValue = parseInt(products[i].nextElementSibling.innerHTML) + parseInt(number);
                    data = newValue + '<input type="hidden" class="form-control" name="numbers[]" value="' + newValue + ' ">';
                    check = 1;
                    products[i].nextElementSibling.innerHTML = data;
                    break;
                }
            }
            if (check == 0) {
                $('#body_products').append('<tr>\n' +
                    '                                                    <td style="text-align: center">' + cate + '<input type="hidden" class="form-control" name="products[]" value="' + value + ' "></td>\n' +
                    '                                                    <td style="text-align: center" class="product_items">' + text + '</td>\n' +
                    '                                                    <td style="text-align: center">' + number + '<input type="hidden" class="form-control" name="numbers[]" value="' + number + ' "></td>\n' +
                    '                                                    <td style="text-align: center">\n' +
                    '                                                        <button class="btn btn-danger btn-xs delete">\n' +
                    '                                                            <i class="glyphicon glyphicon-trash"></i>\n' +
                    '                                                        </button>\n' +
                    '                                                    </td>\n' +
                    '                                                </tr>');
            }
        } else {
            alert('Number of product must more than 1');
        }
    })
})