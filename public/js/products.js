  $(function() {
    $('.delete').click(function(){delete_product($(this).closest('tr').attr('data'));});
    $('.edit').click(function(){edit_product($(this).closest('tr').attr('data'));});
    $('.update').click(function(){update_product($(this).closest('tr').attr('data'));});
    $('#add_product').on('click', function(){add_product();});
  });

  function delete_product(product_id) {
    $.ajax({
      url: "/api/products/" + product_id,
      type: "DELETE",
      success: function(result){
        $('#tr_'+product_id).remove();
        $('#tr_edit_'+product_id).remove();
      }
    });
  }

  function add_product() {
    $.ajax({
      url: "/api/products",
      type: "POST",
      data: {
        product_name: $('#product_name').val(),
        product_code: $('#product_code').val(),
        price: $('#price').val(),
      },
      success: function(result){
        console.log(result);
        $('#table_product').append(result.html);
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

function edit_product(product_id) {
  $('#tr_'+product_id).hide();
  $('#tr_edit_'+product_id).show();
}

function update_product(product_id) {
    $.ajax({
      url: "/api/products/"+product_id,
      type: "PUT",
      data: {
        product_name: $('#tr_edit_'+product_id+' .product_name').val(),
        product_code: $('#tr_edit_'+product_id+' .product_code').val(),
        price: $('#tr_edit_'+product_id+' .price').val(),
      },
      success: function(result){
        $('#tr_'+product_id+' .product_name').html($('#tr_edit_'+product_id+' .product_name').val());
        $('#tr_'+product_id+' .product_code').html($('#tr_edit_'+product_id+' .product_code').val());
        $('#tr_'+product_id+' .price').html($('#tr_edit_'+product_id+' .price').val());
        $('#tr_'+product_id).show();
        $('#tr_edit_'+product_id).hide();
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

