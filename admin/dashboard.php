<?php
require_once "../admin-layouts/header.php";
?>

<!-- Content Area -->
<div class="content">
    <div class="header">
        <h2>Tarot Reading</h2>
    </div>
    <div class="container mt-4">
        <form id="tarotForm">
            <div class="mb-3">
                <label for="questionCategory" class="form-label">Question Category</label>
                <select class="form-select" id="questionCategory" name="questionCategory" required>
                    <?php
                    $sql = "SELECT * FROM tarot_categories";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['category_name'] . '">' . $row['category_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <h2>QR Code Scanner</h2>
            <button type="button" class="btn btn-primary" id="startScan">Scan QR Code</button>
            <button type="button" class="btn btn-danger" id="stopScan" style="display: none;">Stop Scanner</button>

            <div id="qr-reader" class="mt-3" style="width: 300px; margin: auto; display: none;"></div>

            <div class="mb-3">
                <label for="qr-result" class="form-label">Tarot Card</label>
                <input type="text" id="qr-result" class="form-control" readonly>
            </div>

            <button type="button" class="btn btn-primary" id="generateResponse">Submit</button>
            <button type="button" class="btn btn-success" id="saveToDatabase" disabled>Save to Database</button>
        </form>
    </div>
</div>

<!-- QR Code Scanner Script -->
<script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
<script>
    let qrReader;

    document.getElementById("startScan").addEventListener("click", function () {
        document.getElementById("qr-reader").style.display = "block"; // Show scanner area
        document.getElementById("stopScan").style.display = "inline-block"; // Show Stop button

        qrReader = new Html5Qrcode("qr-reader");

        qrReader.start(
            { facingMode: "environment" }, // Use back camera
            { fps: 10, qrbox: 250 },
            (decodedText) => {
                document.getElementById("qr-result").value = decodedText; // Update input field
                qrReader.stop(); // Stop scanning after successful detection
                document.getElementById("stopScan").style.display = "none"; // Hide Stop button
            },
            (errorMessage) => { console.log("Scanning error: ", errorMessage); }
        ).catch((err) => { console.log("Camera error: ", err); });
    });

    document.getElementById("stopScan").addEventListener("click", function () {
        if (qrReader) {
            qrReader.stop().then(() => {
                document.getElementById("qr-reader").style.display = "none"; // Hide scanner
                document.getElementById("stopScan").style.display = "none"; // Hide Stop button
            }).catch((err) => {
                console.log("Error stopping scanner: ", err);
            });
        }
    });
</script>

<?php
require_once "../admin-layouts/footer.php";
?>
