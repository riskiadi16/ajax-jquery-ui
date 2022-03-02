<!DOCTYPE html>
<html>
<head>
 <title>
 Ajax JQuery UI CRUD with PHP
 </title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/hot-sneaks/jquery-ui.css" />
 <script type="text/javascript" src="jquery-3.6.0.js"></script>
 <script type="text/javascript" src="jquery-ui.js"></script>
</head>

<style>
  body {
  background-image: url("bg.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }

   table {
        font-family: verdana, arial, sans-serif;
        font-size: 14px;
        color: #333333;
        border-width: 3px;
        border-color: #3A3A3A;
        border-collapse: collapse;
    }
    table th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #FFA6A6;
        background-color: #D56A6A;
        color: #ffffff;
    }
    table tr:hover td {
        cursor: pointer;
    }
    table tr:nth-child(even) td{
        background-color: #F7CFCF;
    }
    table td {
        border-width: 3px;
        padding: 8px;
        border-style: solid;
        border-color: #FFA6A6;
        background-color: #ffffff;
    
</style>

<body>
 <div class="container">
 <br> 
 <h3>Ajax JQuery UI CRUD with PHP</h3>
 <div align="right">
 <button type="button" name="add" id="add" class="btn btn-primary btn-s">Add</button>
 </div><br>
 <div id="user_data" class="table-responsive">
 <!-- load data here -->
 </div>
 </div>
 <div id="input_modal" title="Add User | Edit User">
 <form method="post" id="user_form">
 <div class="form-group">
 <label>Full Name</label>
 <input type="text" name="full_name" id="full_name" class="form-control">
 <span id="error_full_name" class="text-danger"></span>
 </div>
 <div class="form-group">
 <label>Email</label>
 <input type="text" name="email" id="email" class="form-control">
 <span id="error_email" class="text-danger"></span>
 </div>
 <div class="form-group">
 <label>Address</label>
 <input type="text" name="address" id="address" class="form-control">
 <span id="error_address" class="text-danger"></span>
 </div>
 <div class="form-group">
 <input type="hidden" name="action" id="action" value="insert">
 <input type="hidden" name="hidden_id" id="hidden_id" >
 <input type="submit" name="form_action" id="form_action"
 class="btn btn-info" value="insert">
 </div>
 </form>
 </div>
 <div id="action_alert" title="Action">
 </div>
 <div id="delete_confirmation" title="Confirmation">
 <p>Are you sure you want to Delete this data?</p>
 </div>
</body>
</html>
<script type="text/javascript" src="ajax_code.js"></script> 