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
                <div class="mb-3 mt-3">
                    <label for="question" class="form-label">Question </label>
                    <textarea class="form-control" id="question" name="question" rows="5"
                        placeholder="Add your Questions" required></textarea>
                </div>

                <h2>QR Code Scanner</h2>
                <button class="btn btn-primary" onclick="startScanner()">Scan QR Code</button>

                <div id="qr-reader" class="mt-3" style="width: 300px; margin: auto; display: none;"></div>

                <div class="mb-3">
                    <label for="qr-result" class="form-label">Tarot Card</label>
                    <input type="text" id="qr-result" class="form-control" readonly>
                </div>

                <script>
                    function startScanner() {
                        document.getElementById("qr-reader").style.display = "block";
                        const qrReader = new Html5Qrcode("qr-reader");

                        qrReader.start(
                            { facingMode: "environment" }, // Use back camera
                            { fps: 10, qrbox: 250 },
                            (decodedText) => {
                                document.getElementById("qr-result").value = decodedText; // Update input field
                                qrReader.stop(); // Stop scanning after successful detection
                            },
                            (errorMessage) => { console.log(errorMessage); }
                        ).catch((err) => { console.log("Camera error: ", err); });
                    }
                </script>
                <button type="button" class="btn btn-primary" id="generateResponse">Submit</button>

                <div class="mb-3 mt-3">
                    <label for="gptResponse" class="form-label">ChatGPT Response</label>
                    <textarea class="form-control" id="gptResponse" name="gptResponse" rows="5"
                        placeholder="Response will appear here..." required></textarea>
                </div>

                <button type="button" class="btn btn-success" id="saveToDatabase" disabled>Save to Database</button>
            </form>
        </div>
    </div>

    <?php
require_once "../admin-layouts/footer.php";

?>
