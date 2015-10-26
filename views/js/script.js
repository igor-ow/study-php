$(function(){

    $(document).on('click', '#get_new_order', function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/admin/ajax/ajax_json.php',
            data: 'order=new',
            success: function(data){
                $('#ajax_html').hide();
                $('#ajax_json').show();
                $('#ajax').show();

                $('#td_id').html(data['id']);
                $('#td_date').html(data['date']);
                $('#td_name').html(data['name']);
                $('#td_num_table').html(data['num_table']);
                $('#td_comment').html(data['comment']);
                $('#td_edit').attr('href', data['link_edit'] );
                $('#td_delete').attr('href', data['link_delete'] );
            }
        });
    });

    $(document).on('click', '#get_last_order', function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '/admin/ajax/ajax_html.php',
            data: 'order=old',
            success: function(data){
                $('#ajax_json').hide();
                $('#ajax_html').show();
                $('#ajax').show();

                $('#ajax_html').html(data);
            }
        });
    });

});