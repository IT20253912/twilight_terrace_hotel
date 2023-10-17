<!DOCTYPE html>
<html>
<head>
<style>
    
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
        /* Style for the table container */
       
    </style>
</head>
<body>
<div class="title-bar">
    <h1>Manage Packages</h1>
    <a href="../adminhome/home">Admin Pannel</a> |
    <a href="../viewusers/view.php">View All Users</a>
</div>
<br />


</body>
</html>
 <?php 
 include "../../../packages/manage_packages.php";
 ?>