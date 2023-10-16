<!DOCTYPE html>
<html>
<head>
    <title>Add Package</title>
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
