  $(function() {
    $('.delete').click(function(){delete_client($(this).closest('tr').attr('data'));});
    $('.edit').click(function(){edit_client($(this).closest('tr').attr('data'));});
    $('.update').click(function(){update_client($(this).closest('tr').attr('data'));});
    $('#add_client').on('click', function(){add_client();});
  });

  function delete_client(client_id) {
    $.ajax({
      url: "/api/clients/" + client_id,
      type: "DELETE",
      success: function(result){
        $('#tr_'+client_id).remove();
        $('#tr_edit_'+client_id).remove();
      }
    });
  }

  function add_client() {
    $.ajax({
      url: "/api/clients",
      type: "POST",
      data: {
        first_name: $('#first_name').val(),
        last_name: $('#last_name').val(),
        phone: $('#phone').val(),
        email: $('#email').val()
      },
      success: function(result){
        console.log(result);
        $('#table_client').append(result.html);
      },
      error: function(result){
        console.log(result);
        var error_message = "Some errors occured!";
        if (result.status == 401) {
          error_message = "You are not logged in!";
        }  
        if (result.status == 400) {
          error_message = result.responseJSON.error_message;
        }  
        alert(error_message);
      }
    });
  }

function edit_client(client_id) {
  $('#tr_'+client_id).hide();
  $('#tr_edit_'+client_id).show();
}

function update_client(client_id) {
    $.ajax({
      url: "/api/clients/"+client_id,
      type: "PUT",
      data: {
        first_name: $('#tr_edit_'+client_id+' .first_name').val(),
        last_name: $('#tr_edit_'+client_id+' .last_name').val(),
        phone: $('#tr_edit_'+client_id+' .phone').val(),
        email: $('#tr_edit_'+client_id+' .email').val()
      },
      success: function(result){
        $('#tr_'+client_id+' .first_name').html($('#tr_edit_'+client_id+' .first_name').val());
        $('#tr_'+client_id+' .last_name').html($('#tr_edit_'+client_id+' .last_name').val());
        $('#tr_'+client_id+' .phone').html($('#tr_edit_'+client_id+' .phone').val());
        $('#tr_'+client_id+' .email').html($('#tr_edit_'+client_id+' .email').val());
        $('#tr_'+client_id).show();
        $('#tr_edit_'+client_id).hide();
      },
      error: function(result){
        console.log(result);
        var error_message = "Some errors occured!";
        if (result.status == 401) {
          error_message = "You are not logged in!";
        }  
        if (result.status == 400) {
          error_message = result.responseJSON.error_message;
        }  
        alert(error_message);
      }
    });
}

