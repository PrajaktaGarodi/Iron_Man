<?php
// saveClothes.php

include("common/connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // include 'db_connection.php'; // Include database connection

    $date = $_POST['date'];
    $customerName = $_POST['customerName'] ?? null;
    $clothCount = intval($_POST['clothCount']);
    $costPerCloth = floatval($_POST['costPerCloth']);
    $totalAmount = floatval($_POST['totalAmount']);

    $sql = "INSERT INTO clothes (date, customer_name, cloth_count, cost_per_cloth, total_income) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssidd', $date, $customerName, $clothCount, $costPerCloth, $totalAmount);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        http_response_code(500);
        echo "Error: " . $conn->error;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h2>Add New Entry</h2>
        <form id="addClothesForm" method="post">
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="mb-3">
                <label for="customerName" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Optional">
            </div>
            <div class="mb-3">
                <label for="clothCount" class="form-label">Number of Clothes</label>
                <input type="number" class="form-control" id="clothCount" name="clothCount" required>
            </div>
            <div class="mb-3">
                <label for="costPerCloth" class="form-label">Cost Per Cloth</label>
                <input type="number" class="form-control" id="costPerCloth" name="costPerCloth" value="10" required>
            </div>
            <div class="mb-3">
                <label for="totalAmount" class="form-label">Total Amount</label>
                <input type="number" class="form-control" id="totalAmount" name="totalAmount" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Listen for changes in 'clothCount' and 'costPerCloth' inputs
            $('#clothCount, #costPerCloth').on('input', function() {
                // Get the input values
                const clothCount = parseFloat($('#clothCount').val()) || 0;
                const costPerCloth = parseFloat($('#costPerCloth').val()) || 0;

                // Calculate the total amount
                const totalAmount = clothCount * costPerCloth;

                // Set the calculated value in the 'totalAmount' field
                $('#totalAmount').val(totalAmount.toFixed(2));
            });
        });
    </script>
</body>

</html>