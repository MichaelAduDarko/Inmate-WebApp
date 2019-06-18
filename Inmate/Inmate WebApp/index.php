<!DOCTYPE HTML>

<head>
    <html>
    <title>Inmate Roster</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <style>
        .r-1em{ margin-right:lem; }
    .b-1em{ margin-bottom: lem; }
    .l-1em{ margin-left: lem; }
    .mt0 { margin-top: 0; }
    .headColor{
     
        background-color: rgba(32, 166, 198, 0.49);
       
        
    }
        
</style>

    </html>
</head>

<body>

    <div class="container">

        <div class="page-header headColor">
            <h1>Inmate Roster</h1>
        </div>

        <?php
        
        include 'confi/database.php';
        
        $action = isset ($_GET['action']) ? $_GET['action'] : "";
        
        if ($action == 'deleted'){
            echo "<div class='alert alert-success'>Record was deleted.</div>";
        }

        $query= "SELECT id, name, description, bond FROM inmate ORDER by id DESC";
        $stmt= $con->prepare($query);
        $stmt->execute();
        
        $num=$stmt->rowCount();
        
        echo "<a href= 'create.php' class='btn btn-primary b-lem'>ADD new inmate</a>";
        if ($num >0){
            
            echo "<table class='table table-hover table-responsive table-bordered'>";
            
            echo "<tr>";
            echo "<th>Inmate ID</th>";
            echo "<th>Name</th>";
            echo "<th>Crime</th>";
            echo "<th>Bond</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$description}</td>";
                echo "<td>&#36;{$bond}</td>";
                echo "<td>";
                echo "<a href='read.php?id={$id}' class='btn btn-info r-1em'>More Info</a>";
                echo "<a href='read.php?id={$id}' class='btn btn-primary r-1em'>Edit</a>";
                echo "<a href='#' onclick='delete_user({$id});' class='btn btn-danger'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
          
            echo "</table>";
        }else {
        echo "<div class= 'alert alert-danger'>No records found.</div>";
        }
       ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>

    <script type='text/javascript'>
        function delete_user(id) {

            var answer = confirm('Are you sure');
            if (answer) {
                window.location = 'delete.php?id=' + id;

            }



        }
    </script>
</body>