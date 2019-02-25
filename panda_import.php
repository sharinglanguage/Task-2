<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

</head>

<body>
    
        <div class="container">
            <div class="row" style="font-size:20px">

                <form class="form-horizontal" action="panda_functions.php" method="post" name="upload_file" enctype="multipart/form-data">
                    <fieldset>

                        
                        <h1 style="text-align:center; margin-top:40px; margin-right:40px;padding:10px" class="bg-info">Import File</h1>

                        <!-- Select Button -->
                        <br><br>
                
                        <div class="form-group">
                            <label class="col-md-4 control-label text-primary" for="filebutton">Select CSV File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" accept=".csv" class="input-large">
                            </div>
                        </div>
                        <br>

                        <!-- Import and Show Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label text-primary" for="singlebutton">Import and show File</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>

                    </fieldset>
                </form>

            </div>
            <?php
              // get_all_records();
            ?>
        </div>
    
</body>

</html>