<script>
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
          $('#example1').load("{{ route('admin.mail.getmail') }} #reloadajax");
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
      $('#example1').load();
    });
    // ----------------Modal get edit Mail-------------
    $('body').delegate('#edit-mail', 'click', function(e) {
    	var id = $(this).attr("data");
    	console.log(id);
    	$.get("{{ route('admin.mail.getEditMail') }}",{id : id}, function(data){
    		console.log(data);
    		$("#frm-editmailmodal").find('#first_name').val(data.first_name);
    		$("#frm-editmailmodal").find('#last_name').val(data.last_name);
    		$("#frm-editmailmodal").find('#email').val(data.email);
    		$("#frm-editmailmodal").find('#company').val(data.company);
    		if(data.sex==$('#sex').val()){
    			$("#frm-editmailmodal").find("#sex").attr('checked',true);
    		}
    		else{
    			$("#frm-editmailmodal").find("#sex").attr('checked',false);
    		}
        	$("#EditMailModal").modal('show');
        	$('#btn_editemail').click(function(){
        		alert($('input[name=sex]:checked').val());
        	});
    	});
    });
    // ------------------Modal Post edit mail -------------
    $('#frm-editmailmodal').on('submit',function(e){
	    e.preventDefault();
	    var data = $(this).serialize();
	    var url = $(this).attr('action');
	    $.post(url,data,function(data){
	    	console.log(data);
	    });
  	});
    // -------------magicSuggrest------------
    // var email_tos = $('#email_tos').magicSuggest({
    //   data: '',
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
</script>