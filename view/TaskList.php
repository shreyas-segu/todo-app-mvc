<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Bungee|Bungee+Shade" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-5"><span class="header navbar-brand mx-auto">Vtiger mvc TODO</span></nav>
    <div class="container">
        <form method="post" action="index.php" class="form-horizontal">
            <div class="input-group mb-3">
                <input type="text" name="task" placeholder="Enter a task..." class="form-control" autocomplete="off" required>
                <div class="input-group-append"><button type="submit" name="submit" class="btn btn-primary bg-dark">ADD</button></div>
            </div>
        </form>
        <table class="table table-hover" >
            <thead>
                <tr>
                    <th>Tasks</th>
                    <th style="width:50px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($x = $tasks->fetch()) {
                    echo '<tr>
                    <td>' . $x['task'] . '</td>
                    <td><a class="cancel" href="index.php?del=' . $x['id'] . '">x</a>' . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>