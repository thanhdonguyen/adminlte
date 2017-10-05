  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
    // --------------Token----------------
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // -----------modal addmail ---------------
    $("#btn_addmail").click(function(){
        $("#AddmailModal").modal();
    });
    $('#frm-addmail').on('submit',function(e){
      e.preventDefault();
      var data = $(this).serialize();
      var url = $(this).attr('action');
      var post = $(this).attr('method');
      $('#email-error').html("");
      $.ajax({
        type : post,
        url : url,
        data : data,
        dataType : 'json',
        success:function(data){
          console.log(data.email3);
          $('#AddmailModal').modal('hide');
          swal("Insert success !", "You clicked the button!", "success");
          // var row = '<tr><td><input type="checkbox" class="chkbx" value="' + data.email3 + '"></td><td>' + data.email3 + '</td><td>' + data.company + '</td></tr>';
          // $('#customers').append(row);
          $('#frm-addmail').trigger('reset');
        },
        error: function(data){
          var errors = data.responseJSON;
          // console.log(data);
          $('#email-error').html(errors.errors.email3[0]);
          $('#email-error1').addClass("has-feedback has-error");
        }
      });
      // console.log(data);
    });
    //Close modal
    $('#close-addmail').click(function(){
      // alert(1111);
      $('#email-error1').removeClass("has-feedback has-error");
      $('#email-error').empty();
      $('#frm-addmail').trigger('reset');
    });
    // ----------------Modal update Mail-------------
    $("#update-mail").click(function(){
      // alert(111);
        $("#UpdatemailModal").modal();
    });
    // -------------magicSuggrest------------
    // var email_tos = $('#email_tos').magicSuggest({
    //   data: '{{ route('getApi') }}',
    //   ajaxConfig: {
    //     xhrFields: {
    //       withCredentials: true,
    //     }
    //   }
    // });
    // $(email_tos).on('selectionchange', function(){
    //   var objval_array = this.getValue();
    //   $('input[name=customer_ids]').val(JSON.stringify(objval_array));
    // });
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    // $( "input[type=checkbox]" ).on( "click", function(){
    //   // alert($(this).val());
    //   ('#mail').val($(this).val());
    // });
    $("#checkAll").click(function () {
      $('input:checkbox').not(this).prop('checked', this.checked);
      var text = "";
      $('.chkbx:checked').each(function(){
          text += $(this).val()+',';
      });
      text = text.substring(0,text.length-1);
      $('#email_to').val(text);
    });
    $('.chkbx').click(function(){
      var text = "";
      $('.chkbx:checked').each(function(){
          text += $(this).val()+',';
      });
      text = text.substring(0,text.length-1);
      $('#email_to').val(text);
    });
  });