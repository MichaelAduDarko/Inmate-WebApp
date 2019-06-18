<!DOCTYPE HTML>
<html>
    <head>
        <title>Inmate Read</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <style>
            .headColor
            {
                background-color: #3ca3c4;
            }
            
            
            
        </style>
    </head>
    <body>
        <div class="container">

            <div class="page-header headColor">
                <h1>Inmate Information</h1>
            </div>

            <?php
            $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

            include 'confi/database.php';

            try {
                $query = "SELECT id, name, description, bond FROM inmate WHERE id = ? LIMIT 0,1";
                $stmt = $con->prepare($query);

                $stmt->bindParam(1, $id);

                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $name = $row['name'];
                $description = $row['description'];
                $bond = $row['bond'];
            } catch (PDOException $exception) {
                die('ERROR: ' . $exception->getMessage());
            }
            ?> 
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td><strong> Name</strong></td>
                    <td><?php echo htmlspecialchars($name, ENT_QUOTES); ?></td>
                </tr>
                <tr>
                    <td><strong>Crime</strong></td>
                    <td><?php echo htmlspecialchars($description, ENT_QUOTES); ?></td>
                </tr>
                <tr>
                    <td><strong>Bond</strong></td>
                    <td><?php echo htmlspecialchars($bond, ENT_QUOTES); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a href='index.php' class='btn btn-danger'>Back to Inmate Roster</a>
                    </td>
                </tr>
            </table> 
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>