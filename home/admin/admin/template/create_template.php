<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}
.title-bar {
            background-color: #2d2d2e;
            color: white;
            padding: 10px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .title-bar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
.test {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color:#f0f0f0;
  /* margin-top:10px; */
}
input[type=text], select, textarea {
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  margin-left:10px;
}
label {
  padding: 10px 12px 2px 0;
  display: inline-block;
  margin-left:10px;
  font-weight: bold;
}
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
  margin-left:10px;
  margin-bottom:10px;
}
input[type=submit]:hover {
  background-color: #45a049;
}
.container {
  border-radius: 10px;
  background-color: #FFFFFF;
  padding: 5px;
  width:60%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  
}
.col-25 {
  float: left;
  width: 355%;
  margin-top: 6px;
}
.col-75 {
  float: left;
  width: 65%;
  margin-top: 6px;
}
.row::after {
  content: "";
  display: table;
  clear: both;
}
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
    margin-bottom: 10px;
  }
}
</style>
</head>
<body>
<div class="title-bar">
    <h1>Create Email Templete</h1>
     <a href="../adminhome/home/index.php">Admin Pannel</a> | <a href="view_templates.php">Manage Templetes</a>
    
</div>
<div class="test">
<div class="container">
  <form action="process_template.php" method="post">
  <div class="row">
    <div class="col-25">
      <label for="fname">Template Name:</label>
    </div>
    <div class="col-75">
      <input type="text" name="template_name" id="template_name" required placeholder="Templete name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Subject</label>
    </div>
    <div class="col-75">
      <textarea name="template_description" id="template_description" placeholder="Write templete.." style="height:200px"></textarea>
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="Create Template">
  </div>
  </form>
</div>
</div>
</body>
</html>




