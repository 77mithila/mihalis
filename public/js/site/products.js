/**
 * Created by mithila on 22/12/2016.
 */

$(document).ready(function() {

    $('#category').change(function () {
        var cat = $(this).val();
        $('.prod-groups').each(function () {
            if ($(this).data('cat') == cat) {
                $(this).show();
            } else {
                $(this).hide();
            }
        })
    });

    $('#category-select').change(function () {
        var cat = $(this).val();
        $('.product-groups').each(function () {
            if ($(this).data('cat') == cat) {
                $(this).show();
            } else {
                $(this).hide();
            }
        })
    });

    $('#productCode').focus( function () {
        var code = '';
        var cat  = $("#category option:selected").text();
        code += (cat == 'flowery leaves' ? 'FLE' : cat.substr(0,3).toUpperCase()) + '-'; //category
        code += $("#productGroup option:selected").text().substr(0,5).toUpperCase() + '-'; //group
        code += 'number-';
        code += $("#productAge option:selected").text().substr(0,3).toUpperCase(); //age

        $(this).val(code);
    });

    $('#submitProductsForm').click( function (e) {
        e.preventDefault();
        var data = {
            _token : $('#tokenField').val(),
            name   : $('#productName').val(),
            code   : $('#productCode').val(),
            ageId  : $('#productAge').val(),
            costPrice      : $('#costPrice').val(),
            maxRetailPrice : $('#maxRetailPrice').val(),
            minRetailPrice : $('#minRetailPrice').val(),
            minWhlslPrice  : $('#minWhlslPrice').val(),
            productCategoryId : $('#category').val(),
            productGroupId    : $('#productGroup').val()
        };

        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                if (data[key] == '' || data[key] == '#') {
                    toastr.error('All fields are required to be filled','Problem!!');
                    return false;
                }
            }
        }

        $.post('/products/add-product',data).done(function(){
            toastr.success('Product successfully added', 'HURRAY!!');
        });
    });

    $('#submitGroupsForm').click( function (e) {
        e.preventDefault();
        var data = {
            _token : $('#tokenField').val(),
            name   : $('#groupName').val(),
            displayName : $('#displayName').val(),
            description : $('#description').val(),
            productCategoryId : $('#categoryId').val()
        };

        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                if (data[key] == '' || data[key] == '#') {
                    toastr.error('All fields are required to be filled','Problem!!');
                    return false;
                }
            }
        }

        $.post('/products/add-group',data).done(function(){
            toastr.success('Product group successfully added', 'HURRAY!!');
        });
    });

    $('#clearForm').click( function () {
        console.log('cancel clicked');
    });

});