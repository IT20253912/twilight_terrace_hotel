<!DOCTYPE html>
<html>
<head>
    <title>Add Package</title>
    <style>
         <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #007BFF;
            color: #fff;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
        }

        a.update {
            background-color: #28a745;
            color: #fff;
        }

        a.delete {
            background-color: #dc3545;
            color: #fff;
        }

        a:hover {
            opacity: 0.8;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <h1>Add Package</h1>
    <form action="process_package.php" method="post" enctype="multipart/form-data">
        <label for="package_name">Package Name:</label>
        <input type="text" name="package_name" required><br>

        <label for="description">Description:</label>
        <textarea name="description"></textarea><br>

        <label for="count">Count:</label>
        <input type="number" name="count" required><br>

        <label for="location">Location:</label>
        <input type="text" name="location"><br>

        <label for="price">Price:</label>
        <input type="text" name="price" required><br>

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*"><br>

        <input type="submit" value="Add Package">
    </form>
</body>
</html>
