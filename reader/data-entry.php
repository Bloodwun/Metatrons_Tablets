<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'reader') {
    header("Location: ../login.php");
    exit();
}

include '../layouts/header.php';
?>

<div class="content">
    <div class="compose">
        <div class="forms">
            <h2>Data Entry</h2>

            <!-- Dropdown Menu -->
            <div class="group clearfix slideInLeft animated">
                <label class="pull-left" for="dropdown">Select an Option</label>
                <select class="pull-right" name="dropdown" id="dropdown" required>
                    <option value="">-- Select --</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>

            <!-- QR Code Scanning Box -->
            <div class="group clearfix slideInLeft animated">
                <label class="pull-left" for="qr_code">Scan QR Code</label>
                <input class="pull-right" type="text" id="qr_code" name="qr_code" placeholder="Scan QR code here">
                <button class="btn" id="scanQrCode">Scan</button>
            </div>

            <!-- Scanner Box (Hidden Initially) -->
            <div id="reader"  style="width: 300px; display: none;"></div>
		
        </div>
    </div>
</div>

<?php include '../layouts/reader-nav.php'; ?>
<?php include '../layouts/footer.php'; ?>

<!-- Include the html5-qrcode library -->
<script src="https://unpkg.com/html5-qrcode"></script>

<!-- QR Code Scanner Script -->
<script>
document.getElementById('scanQrCode').addEventListener('click', function() {
    let reader = document.getElementById('reader');
    let qrCodeInput = document.getElementById('qr_code');

    // Show the scanner box
    reader.style.display = "block";

    const html5QrCode = new Html5Qrcode("reader");

    html5QrCode.start(
        { facingMode: "environment" }, // Use rear camera
        {
            fps: 10,    // Frames per second
            qrbox: 250  // Size of scanning box
        },
        (decodedText) => {
            qrCodeInput.value = decodedText;  // Put scanned text in input field
            html5QrCode.stop();  // Stop scanning after success
            reader.style.display = "none";  // Hide scanner box
        },
        (error) => {
            console.error("QR Code scanning error:", error);
        }
    );
});
</script>
