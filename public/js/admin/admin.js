
let openDeleteModal = function ($_this) {
    $('#item_modal_delete_button').attr('data-slug', $_this.data('key')).attr('data-url', $_this.data('href')).attr('callback',$_this.data('callback'));
    if($_this.data('type')){
        $('#delete_item_label').html('Delete ' + $_this.data('type'));
    }
    $('#delete_item').modal('show');
};

$('body').on('click', '.delete-button', function () {
    openDeleteModal($(this));
});

function xx() {
    alert(555);
}

$('body').on('click', '#item_modal_delete_button', function () {
    let item = $(this);
    $.ajax({
        url: item.data('url'),
        type: 'POST',
        dataType: 'JSON',
        data: {
            slug: item.data('slug')
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        if (! data.error) {
            if (typeof data.url != 'undefined') {
                window.location.href = data.url;
            }
            if(data.callback){
                eval(item.attr('callback'))
                $('#delete_item').modal('hide');
            }else{
                location.reload();
            }

        }
    }).fail(function (data) {
        alert('Could not delete item. Please try again.');
    });
});
