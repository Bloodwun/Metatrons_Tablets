<?php
require_once "../db.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarot Reading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .header {
            background: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
<?php include '../layouts/user-sidebar.php'; ?>
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

    <script>
        $(document).ready(function () {
            $("#generateResponse").click(function () {
                var category = $("#questionCategory").val();
                var card = $("#tarotCard").val();
                if (!category || !card) {
                    alert("Please select a category and a card.");
                    return;
                }

                $.ajax({
                    url: "fetch_gpt_response.php",
                    type: "POST",
                    data: { category: category, card: card },
                    success: function (response) {
                        $("#gptResponse").val(response);
                        $("#saveToDatabase").prop("disabled", false);
                    }
                });
            });

            $("#saveToDatabase").click(function () {
                var category = $("#questionCategory").val();
                var card = $("#tarotCard").val();
                var response = $("#gptResponse").val();

                if (!response.trim()) {
                    alert("Response cannot be empty.");
                    return;
                }

                $.ajax({
                    url: "save_response.php",
                    type: "POST",
                    data: { category: category, card: card, response: response },
                    success: function (result) {
                        alert(result);
                        $("#saveToDatabase").prop("disabled", true);
                    }
                });
            });
        });
    </script>

</body>

</html>