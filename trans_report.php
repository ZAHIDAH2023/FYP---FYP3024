<?php
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Exception;

require_once 'vendor/autoload.php'; // Include Dompdf autoload file
include('config/constant.php');

// Check if transaction ID is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch transaction details based on the provided ID
    $sql = "SELECT * FROM transaction WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    // Check if transaction is found
    if($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

        // Format transaction details into HTML invoice
        $html = '
            <style>
                /* CSS styles for the invoice */
                .invoice-container {
                    width: 100%;
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    font-family: Arial, sans-serif;
                }
                .invoice-header {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .invoice-table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                .invoice-table th, .invoice-table td {
                    border: 1px solid #ccc;
                    padding: 10px;
                    text-align: left;
                }
            </style>
            <div class="invoice-container">
                <div class="invoice-header">
                    <h1>Payment Invoice</h1>
                </div>
                <table class="invoice-table">

                    <address>
                        <strong>Billed To:</strong><br>
                        ' . $row['stud_name'] . '<br>

                        <strong>Date:</strong><br>
                        ' . $row['date'] . '<br>

                        <h2>Payment Summary</h2>

                    </address>
                    
                    <tr>
                        <th>Student Name</th>
                        <th>Paid Fee</th>
                        <th>Remark</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td>' . $row['stud_name'] . '</td>
                        <td>RM' . $row['fees'] . '.00</td>
                        <td>' . $row['fees_remark'] . '</td>
                        <td>' . $row['date'] .  '</td>
                    </tr>

                    <address>
                        <br>
                        <strong>Total Payment:</strong><br>
                        RM' . $row['fees'] . '.00<br>

                        <strong>Tax:</strong>
                        Null<br>

                        <p>Approved By<br><strong>Dunia Bestari Education Centre</strong></p>
                    </address>

        ';

        // Create Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output PDF to browser
        $dompdf->stream('invoice.pdf', array('Attachment' => 0));
    } else {
        echo "Transaction not found.";
    }
} else {
    echo "Transaction ID not provided.";
}

?>