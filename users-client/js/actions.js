$(document).ready(function(){

  $('#btn-login').click(function()
  {
    $.ajax({
      url: 'http://104.197.242.219/login',
      type: 'POST',
      data: {
        nickname: $('#txt-login-nickname').val(),
        password: $('#txt-login-password').val()
      },
      success: function(result) {
        if(result.error != null)
        {
          return swal("Oh, something was wrong", result.error, "error");
        }else
        {
          localStorage.setItem("token", result.token);
          $(location).attr('href','http://localhost/users-client/index.php');
        }
      }
    });
  });


  $('#usr-btn-save').click(function()
  {
    if($('#txt-id').val() != "")
    {
      $.ajax({
        url: 'http://104.197.242.219/api/user-update',
        type: 'POST',
        data: {
          id: $('#txt-id').val(),
          firstnames: $('#txt-firstnames').val(),
          lastnames: $('#txt-lastnames').val(),
          nickname: $('#txt-nickname').val(),
          password: $('#txt-password').val(),
          remark: $('#txt-remark').val(),
          remember_token: localStorage.getItem("token")
        },
        success: function(result) {
          return swal("Great!", 'Successful operation', "success");
        },
        error: function(requestObject, error, errorThrown) {
          return swal("Oh, something was wrong", error, "error");
        }
      });
    }else {
      $.ajax({
        url: 'http://104.197.242.219/api/user',
        type: 'POST',
        data: {
          firstnames: $('#txt-firstnames').val(),
          lastnames: $('#txt-lastnames').val(),
          nickname: $('#txt-nickname').val(),
          password: $('#txt-password').val(),
          remark: $('#txt-remark').val(),
          remember_token: localStorage.getItem("token")
        },
        success: function(result) {
          return swal("Great!", 'Successful operation', "success");
        },
        error: function(requestObject, error, errorThrown) {
          return swal("Oh, something was wrong", error, "error");
        }
      });
    }

    usrLoadTable();
    usrUsers();
    $('#txt-nickname').removeAttr('disabled');
    $('#txt-password').removeAttr('disabled');
    $('#txt-id').val('');

    $('#usr-btn-clear').click();
  });

  $('#btn-logout').click(function(){
    localStorage.removeItem('token');
  });

  $('#usr-btn-clear').click(function(){
    usrLoadTable();

    $('#txt-nickname').removeAttr('disabled');
    $('#txt-password').removeAttr('disabled');
    $('#txt-firstnames').val('')
    $('#txt-lastnames').val('');
    $('#txt-nickname').val('');
    $('#txt-password').val('');
    $('#txt-remark').val('');
    $('#txt-id').val('');
  });

  $('#btn-set-nickname').click(function(){
    if($('#txt-config-nickname').val() == "")
    {
      return swal("Oh, something was wrong", "That user is invalid", "error");
    }

    $.ajax({
      url: 'http://104.197.242.219/api/user-config',
      type: 'POST',
      data: {
        nickname: $('#txt-config-nickname').val(),
        remember_token: localStorage.getItem("token")
      },
      success: function(result) {
        $('#txt-config-nickname').val('');
        return swal("Great!", 'The nickname was update', "success");
      },
      error: function(requestObject, error, errorThrown) {
        return swal("Oh, something was wrong", error, "error");
      }
    });
  });

  $('#btn-set-password').click(function(){
    $.ajax({
      url: 'http://104.197.242.219/api/user-config',
      type: 'POST',
      data: {
        older: $('#txt-config-password-old').val(),
        newer: $('#txt-config-password-new').val(),
        remember_token: localStorage.getItem("token")
      },
      success: function(result) {
        $('#txt-config-password-old').val('');
        $('#txt-config-password-new').val('');
        console.log(result.error)
        if(result.error)
        {
          return swal("Oh, something was wrong", result.error, "error");
        }
        else
        {
          return swal("Great!", 'The password was update', "success");
        }
      },
      error: function(requestObject, error, errorThrown) {
        return swal("Oh, something was wrong", error, "error");
      }
    });
  });
});
