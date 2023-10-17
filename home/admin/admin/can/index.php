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
    </style>
</head>
<body>
<div class="title-bar">
    <h1>Manage Users</h1>
    <a href="../adminhome/home">Admin Pannel</a> |
    <a href="../viewusers/view.php">View All Users</a> |
    <a href="templetesend.php">Use Templete</a>
</div>
<br />
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        textarea, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="send.php" method="POST">
        <textarea name="email" rows="5" cols="40" placeholder="Enter email addresses separated by commas or new lines"><?php
            if(isset($_GET['emails'])){
                echo implode(', ', $_GET['emails']);
            }
        ?></textarea><br>
        Subject<input type="text" name="subject" value=""><br>
        Message<input type="text" name="message" value=""><br>
        <button type="submit" name="send">Send</button>
    </form>
</body>
</html>



