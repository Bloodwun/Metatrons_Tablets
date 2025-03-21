<?php
require_once "../db.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  .tarot-card {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    width: 200px; /* Adjust based on actual size */
    height: 300px; /* Adjust based on actual size */
    background-color: black; /* Keeping your first layer */
    border-radius: 15px; /* Rounded edges */
  /* padding: 10px; */
  background: url('../assets/images/metatroncard.jpg') no-repeat center center;
  background-size: cover; /* Ensure the image covers the entire card */
  text-align: center;
  position: relative; /* Ensures images inside are positioned relative to the card */
  display: inline-block;
  margin: 10px;
}

.layer1 {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    position: absolute;
}

.sphere {
  top: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100px; /* Adjust as needed */
    height: 100px; /* Adjust as needed */
    position: relative;
}

.qr-code {
    display: flex;
    justify-content: center;
    align-items: center;

}
.qr-code img {
    width: 85%;
    height: 100%;
}

.tarot-title {
    margin-top: 10px; /* Adjust spacing */
    text-align: center;
    color: white;
    font-size: 18px;
}

  </style>
</head>

<body>
<?php
// Fetch data from tarot_cards table
$sql = "SELECT * FROM tarot_cards";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
       

        <div class="tarot-card">
            <div class="layer1">

            
            <div class=" sphere ">
                <div id="qrcode-<?php echo $row['id']; ?>" class="qr-code"></div>
            </div>

            <div class="tarot-title"><?php echo htmlspecialchars($row['card_name']); ?></div>
            </div> <!-- Black background as first layer -->
        </div>
        <?php
    }
} else {
    echo "No categories found.";
}
?>


  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".tarot-card").forEach(function (card) {
        let cardName = card.querySelector(".tarot-title").textContent.trim();
        let qrCodeDiv = card.querySelector(".qr-code");

        new QRCode(qrCodeDiv, {
            text: cardName,
            width: 58,
            height: 58,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        // Click event to send image to the server
        card.addEventListener("click", function () {
            html2canvas(card).then(function (canvas) {
                let imageData = canvas.toDataURL("image/png"); // Get image data

                // Send image data to the server
                fetch("save_image.php", {
                    method: "POST",
                    body: JSON.stringify({ image: imageData, name: cardName }),
                    headers: { "Content-Type": "application/json" }
                })
                .then(response => response.json())
                .then(data => alert(data.message))
                .catch(error => console.error("Error:", error));
            });
        });
    });
});

</script>
</body>

</html>