function usrLoadTable()
{
  $.ajax({
    url: 'http://104.197.242.219/user',
    type: 'GET',
    success: function(data) {
      $(".cpa").remove();

      $.each(data, function(index, value){
        $('#user-table').append('<tr class="cpa">' +
            '<td>' + value.id + '</td>' +
            '<td>' + value.nickname + '</td>' +
            '<td>' + value.lastnames + '</td>' +
            '<td>' +
              '<div class="btn-group" role="group" aria-label="Basic example">' +
                  '<button type="button" class="btn btn-success" data-all="' + value.id +  ' , ' + value.firstnames +  ' , ' +  value.lastnames +  ' , '  + value.remark  +'" onclick=' + "usrEdit(this)" + '><i class="fas fa-edit"></i></button>'  +
                  '<button type="button" class="btn btn-danger" onclick="usrDelete(this)" data-id=' + value.id + ' data-name="' + value.nickname + '"!><i class="fas fa-trash-alt"></button>' +
              '</div>' +
            '</td>' +
          '</tr>');
      });
    },
    error: function(requestObject, error, errorThrown) {
      return swal("Oh, something was wrong", error, "error");
    }
  });
}

function usrUsers()
{
  $.ajax({
    url: 'http://104.197.242.219/user',
    type: 'GET',
    success: function(data) {
      $.each(data, function(index, value){
        $('#index-users').append('<div class="col-lg-3">' +
          '<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">' +
            '<div class="card-header"><h5 class="card-title">'+ value.firstnames + '</h5></div>' +
            '<div class="card-body">' +
              '<p class="card-text">'+ value.remark +'</p>'  +
            '</div>' +
          '</div>' +
        '</div>');
      });
    },
    error: function(requestObject, error, errorThrown) {
      return swal("Oh, something was wrong", error, "error");
    }
  });
}

function usrEdit(data)
{
  var result = $(data).attr('data-all');
  result = result.split(',');
  $('#txt-id').val(result[0]);
  $('#txt-firstnames').val(result[1]);
  $('#txt-lastnames').val(result[2]);
  $('#txt-remark').val(result[3]);

  $('#txt-nickname').attr('disabled', true);
  $('#txt-password').attr('disabled', true);
}

function usrDelete(data)
{
  swal({
    title: "Are you sure?",
    text: "The user "+ $(data).attr('data-name') +" will be eliminated forever!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then(function() {
    var token = localStorage.getItem("token");
    $.ajax({
      url: 'http://104.197.242.219/api/user-delete',
      type: 'POST',
      data: {
        id: $(data).attr('data-id'),
        remember_token: token
      },
      success: function(data) {
        return swal("Everybody OK!", data, "success");
      },
      error: function(requestObject, error, errorThrown) {
        return swal("Oh, something was wrong", error, "error");
      }
    });
    usrLoadTable();
    usrUsers();
  });
}
