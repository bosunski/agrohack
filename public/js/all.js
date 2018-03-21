function retrieveMessageList(id) {
    $.get('/user/messages/'+id, function(response) {
        if(response.length > 0) {
            var html = '';
            $.each(response, function(index, message) {
                if(message.recipient_id == id) {
                    var msg = '<div class="sent-message text-left"><p class="message sent">'+message.message+'</p></div>';
                } else {
                    var msg = '<div class="recieved-message text-left"><p class="message recieved">'+message.message+'</p></div>';
                }
                html += msg;
            });
            $("#c-message-list").html(html);
        }
    });
}

$(function() {
    $("#send-report").click(function(event) {
        /* Act on the event */
        event.preventDefault();
        swal({
          title: "Are you sure?",
          text: "confirming this will generate a report of your interactions with OpenFarm and send it, so we can create better services for you.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
              $("#report-form").submit();
          } else {
            //swal("Your contact is still safe.");
          }
        });
    });
});

var refreshTime;
$(function() {
    $("#close-chat").click(function() {
        $("#chat-boxer").fadeOut('fast');

        // Clear Interval
        clearInterval(refreshTime);
    });

    $(".chat-name").click(function() {
      clearInterval(refreshTime);
      var i = '#'+$(this).attr('str');
      var id = $(i).val();
      $.get('/user/'+id, function(response) {
          console.log(response);
          $("#message-location").html(response.location);
          $("#message-name").html(response.name);
          $("#message-phone").html(response.phone);
          $("#message-gender").html(response.gender);


          retrieveMessageList(id);

           $(".prf-boxer").hide();
          $("#chat-boxer").fadeIn('fast');

          refreshTime = window.setInterval(function() {
              retrieveMessageList(id);
          }, 2000);

          $("#message-send").click(function() {
              var message = $("#user-message").val();
              var data = {
                  message: message,
                  recipient_id: id,
                  sender_id: auth_id,
                  _token: $("#_token").val()
              }
              if(message != '') {
                  $.post('/users/sendmessage', data, function(response) {
                      if(response == 'done') {
                          retrieveMessageList(id);
                          $("#user-message").val('');
                      }
                  });
              }
          });
      });
    });

});
