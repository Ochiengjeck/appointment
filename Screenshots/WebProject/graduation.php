<!-- 
    Make sure to replace "username", "password", "database_name", "your_table_name", 
and adjust the column names accordingly to match your MySQL database setup. 
Additionally, you will need to have the PHPExcel library installed or included in your 
project for reading the Excel file.

Please note that this is a basic example and may require additional error handling and 
validation based on your specific requirements. 
-->

<!DOCTYPE html>
<html>
<head>
    <title>Excel File Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" />
        <input type="submit" name="submit" value="Upload File" />
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $file = $_FILES['excelFile']['tmp_name'];
        
        // Check if a file was uploaded
        if (!empty($file)) {
            // Load the PHPExcel library (Make sure it is installed or included)
            require_once 'PHPExcel/PHPExcel.php';

            // Create a new PHPExcel object
            // $objPHPExcel = PHPExcel_IOFactory::load($file);

            // Connect to the MySQLi database (Replace with your database credentials)
            $mysqli = new mysqli("localhost", "username", "password", "database_name");

            // Check connection
            if ($mysqli->connect_errno) {
                die("Failed to connect to MySQL: " . $mysqli->connect_error);
            }

            // Get the active sheet in the Excel file
            $worksheet = $objPHPExcel->getActiveSheet();

            // Iterate through each row in the worksheet
            foreach ($worksheet->getRowIterator() as $row) {
                $rowData = [];
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                // Iterate through each cell in the row
                foreach ($cellIterator as $cell) {
                    $rowData[] = $cell->getValue();
                }

                // Insert the data into the database
                $sql = "INSERT INTO your_table_name (column1, column2, column3) VALUES (?, ?, ?)";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("sss", $rowData[0], $rowData[1], $rowData[2]);
                $stmt->execute();
            }

            // Close the prepared statement and database connection
            $stmt->close();
            $mysqli->close();

            echo "File uploaded and data saved to the database successfully.";
        } else {
            echo "Please select an Excel file to upload.";
        }
    }
    ?>
</body>
</html>





