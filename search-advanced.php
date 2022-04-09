
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    
    <style>
body {
    padding-top: 50px;
}
.dropdown.dropdown-lg .dropdown-menu {
    margin-top: -1px;
    padding: 4px 15px;
}

.btn-group .btn {
    border-radius: 0;
    margin-left: -1px;
}
.form-horizontal .form-group {
    margin-left: 0;
    margin-right: 0;
}


@media screen and (min-width: 768px) {
    #boot-search-box {
        width: 500px;
        margin: 0 auto;
    }
    .dropdown.dropdown-lg {
        position: static !important;
    }
    .dropdown.dropdown-lg .dropdown-menu {
        min-width: 500px;
    }
}
    </style>

</head>
<body>  
      
    <?php
        require "connection.php";
        $category_search = "SELECT title FROM category";
        $categories = [];
        $res = mysqli_query($con, $category_search);
        $totalNumberOfCategories = mysqli_num_rows($res);
        if ($totalNumberOfCategories > 0) {
            $index = 0;
            while ($row = mysqli_fetch_assoc($res)) {
                $categories[$index] = $row['title'];
                $index++;
            }
        }
        
    
    ?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="input-group" id="boot-search-box">
                <form class="form-horizontal" method="POST" action="home.php" role="form">
                    <div class="form-group">
                    <label for="filter">Category:</label>
                    <select class="form-control" name="category">
                        <option value="default" selected>Whole category</option>
                        <?php 
                            for($i = 0; $i < $totalNumberOfCategories; $i++){
                                $category = ucfirst($categories[$i]);
                                    echo "<option value=\"{$category}\">{$category}</option>";
                            }
                            
                        
                        ?>
                        
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="contain">Title:</label> 
                    <input class="form-control" name="title" type="text" />
                    </div>
                    <div class="form-group">
                    <label for="contain">Author:</label>
                    <input class="form-control" name="author" type="text" />
                    </div>
                    <div class="form-group">
                    <label for="contain">Description:</label>
                    <input class="form-control" name="description" type="text" />
                    </div>

                    <div class="form-group">
                    <label for="contain">Year:</label>
                    <input class="form-control" name="year" type="year" />
                    </div>
                    
                    <div class="form-group">
                       
                    <br />                        
                    <button type="submit" class="btn btn-primary btn-block">Search :: <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                
            </div>
        </div>
      
        </form>
        </div>
        </div>
        </div>            
</div>
</body>
</html>
