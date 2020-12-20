(function () {
    window.addEventListener('load', function () {
        var createOneRow = function (rowData, index, $select, deleteRowHundler) {
            var $row = $('<tr>');
            $row.append($('<td>').css('width', '70px').text(index + 1).addClass('text-center'));
            $row.append($('<td>').text(rowData.title));
            $row.append($('<td>').text(rowData.href));
            $row.append($('<td>').text(rowData.order_col));
            $row.append($('<td>').append($select));
            $buttonDel = $('<button type="button" class="btn btn-info btn-outline m-r-5"><i class="icon-trash"></i></button>');
            $buttonDel.on('click', deleteRowHundler);
            $row.append($('<td>').append($buttonDel));
            return $row;
        }
        var deleteRowHundler = function (e) {
            window.alert(15);
        }
        var changeParentHundler = function (e) {
            window.alert(10);
        }
        var createParentSelect = function (navData, currentRow) {
            var $select = $('<select>').addClass('form-control');
            $select.change(changeParentHundler);
            var isNull = false;
            navData.forEach(function (item, index) {
                if (item.title.includes(currentRow.title)) {
                    return;
                }
                if (currentRow.parent_id == null) {
                    if(isNull == false) {
                            $select.append($('<option value="null" selected>').text(" "));
                        isNull = true;
                    }
                } else if (item.id == currentRow.parent_id) {
                    $select.append($('<option value="' + item.id + '" selected>').text(item.title));
                }
                    $select.append($('<option value="' + item.id + '">').text(item.title));
            });
            return $select;
        }
        $.ajax({
            url: '/controlpanel/ajaxadmin/getnavigatealldata',
            data: null,
            method: "POST"
        }).done(function (response) {
            var navData = JSON.parse(response);
            var $table = $('.manage-u-table');
            navData.forEach(function (item, index) {
                $table.append(createOneRow(item, index, createParentSelect(navData, item), deleteRowHundler));
            });
        });
    });
})()