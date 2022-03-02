$(document).ready(function(){
 load_data();
 function load_data(){
 $.ajax({
 url:"fetch.php",
 method:"POST",
 success:function(data){
 $("#user_data").html(data);
 }
 })
 }
 $("#input_modal").dialog({
 autoOpen:false,
 width: 800
 });

 $("#add").click(function(){
 $("#action").val('insert');
 $("#form_action").val("insert");
 $("#input_modal").dialog('open');
 $('#full_name, #email, #address').val('');
 });
 // pada blok kode ini kita akan mendapatkan data dari dialog input dan
 // mengirim dan menyimpan data melalui permintaan ajax
 $('#user_form').on('submit', function(event){
 event.preventDefault();
 var error_full_name = '';
 var error_email = '';
 var error_address = '';
 if($('#full_name').val() == '')
 {
 error_full_name = 'Full Name is required, please enter it.';
 $('#error_full_name').text(error_full_name);
 $('#full_name').css('border-color', '#aa0000');
 }
 else
 {
 error_full_name = '';
 $('#error_full_name').text(error_full_name); 
 $('#full_name').css('border-color', '');
 }
 if($('#email').val() == '')
 {
 error_email = 'Email is required, please enter it.';
 $('#error_email').text(error_email);
 $('#email').css('border-color', '#aa0000');
 }
 else
 {
 error_email = '';
 $('#error_email').text(error_email);
 $('#email').css('border-color', '');
 }
 if($('#address').val() == '')
 {
 error_address = 'Address is required, please enter it.';
 $('#error_address').text(error_address);
 $('#address').css('border-color', '#cc0000');
 }
 else
 {
 error_address = '';
 $('#error_address').text(error_address);
 $('#address').css('border-color', '');
 }
 if(error_full_name != '' || error_email != '' || error_address != '')
 {
 return false;
 }
 else
 {
 $('#form_action').attr('disabled', 'disabled');
 var form_data = $(this).serialize();
 $.ajax({
 url:"php_code.php",
 method:"POST",
 data:form_data,
 success:function(data)
 {
 $('#input_modal').dialog('close');
 $('#action_alert').html(data);
 $('#action_alert').dialog('open'); 
 load_data();
 $('#form_action').attr('disabled', false);
 }
 });
 }
 });
 $('#action_alert').dialog({
 autoOpen:false
 });
 // dapatkan dan kirim data saat mengklik tombol edit
 $(document).on('click', '.edit', function(){
 var id = $(this).attr('id');
 var action = 'get_record';
 $.ajax({
 url:"php_code.php",
 method:"POST",
 data:{id:id, action:action},
 dataType:"json",
 success:function(data)
 {
 $('#full_name').val(data.full_name);
 $('#email').val(data.email);
 $('#address').val(data.address);
 $('#input_modal').attr('title', 'Edit Data');
 $('#action').val('update');
 $('#hidden_id').val(id);
 $('#form_action').val('Update');
 $('#input_modal').dialog('open');
 }
 });
 });
 $('#delete_confirmation').dialog({
 autoOpen:false,
 modal: true,
 buttons:{
 Ok : function(){
 var id = $(this).data('id');
 var action = 'delete';
 $.ajax({
 url:"php_code.php",
 method:"POST", 
 data:{id:id, action:action},
 success:function(data)
 {
 $('#delete_confirmation').dialog('close');
 $('#action_alert').html(data);
 $('#action_alert').dialog('open');
 load_data();
 }
 });
 },
 Cancel : function(){
 $(this).dialog('close');
 }
 }
 });
 $(document).on('click', '.delete', function(){
 var id = $(this).attr("id");
 $('#delete_confirmation').data('id', id).dialog('open');
 });
}); 
