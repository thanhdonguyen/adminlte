  @if(session('sendmail'))
  <script>
    $(document).ready(function(){
      swal("Success !", "Emails have been sent !", "success");
    })
  </script>
  @endif
  @if(session('deletemail'))
  <script>
    $(document).ready(function(){
      swal("Success !", "Emails have been sent !", "success");
    })
  </script>
  @endif
<script>
    function confirmDelete (){
      swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
      } else {
        swal("Your imaginary file is safe!");
      }
    });
    }
     $(document).ready(function() {
        loadData();
    });
    var loadData = function() {
        $.ajax({    //create an ajax request to load_page.php
            type: "GET",
            url: "{{ route('admin.mail.getCount') }}",
            dataType: "html",   //expect html to be returned
            success: function(response){
              $("#countMessage").html(response);
              $(".label-success").html(response);
                // console.log(response);
                // setTimeout(loadData, 5000);
            }
        });
    };
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
          // $('#example1').load("{{ route('admin.mail.getmail') }} #reloadajax");
        },
        error: function(data){
          var errors = data.responseJSON;
          console.log(data);
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
        $("#frm-editmailmodal").find('#id').val(data.id);
    		$("#frm-editmailmodal").find('#last_name').val(data.last_name);
    		$("#frm-editmailmodal").find('#email').val(data.email);
    		$("#frm-editmailmodal").find('#company').val(data.company);
        $("#frm-editmailmodal").find("#sex").each(function(){
          // console.log($(this).val())
          if(data.sex == $(this).val())
            $(this).attr('checked',true);
          else
            $(this).attr('checked',false);
        });
        	$("#EditMailModal").modal('show');
        	// $('#btn_editemail').click(function(){
        	// 	alert($('input[name=sex]:checked').val());
        	// });
    	});
    });
    // ------------------Modal Post edit mail -------------
    $('#frm-editmailmodal').on('submit',function(e){
	    e.preventDefault();
	    var data = $(this).serialize();
	    var url = $(this).attr('action');
	    $.post(url,data,function(data){
	    	console.log(data);
        $('#EditMailModal').modal('hide');
        swal("Updated success !", "You clicked the button!", "success");
        $('#example1').load("{{ route('admin.mail.getmail') }} #reloadajax");
	    });
  	});
    $('#close-editEmail').click(function(){
      // alert(1111);
      $('#frm-editmailmodal').trigger('reset');
      $('#example1').load();
    });
    // -------------------Delete mail ----------------
    $('body').delegate('#btn_delete_email', 'click', function(e) {
      swal({
        title: "Are you sure want to delete ?",
        text: $("#frm-editmailmodal").find('#email').val(),
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          e.preventDefault();
          var id = $("#frm-editmailmodal").find('#id').val();
          var url = '{{ route('admin.mail.deleteMail') }}';
          $.post(url,{id:id}, function(data){
            $('#EditMailModal').modal('hide');
            console.log(data);
          });
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          // $('#EditMailModal').modal('hide');
          swal.stopLoading();
          swal.close();
        }
      });
    });
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
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