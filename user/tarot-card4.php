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
    Try this

    /* Set page background to white */
    .container {
      display: flex;
      /* Activate flexbox */
      justify-content: space-between;
      /* Distribute space evenly */
      gap: 20px;
      /* Space between columns */
    }

    .column {
      flex: 1;
      /* Each column will take equal space */
      padding: 10px;
      border: 1px solid #ccc;
      /* Optional border for visual separation */
      box-sizing: border-box;
      /* Include padding/border in the width */
    }





    #p1 {
      background: white;
    }

    /* Tarot Card Container */
    .tarot-card {
  width: 198px; /* Standard tarot card width */
  height: 305px; /* Standard tarot card height */
  border: 10px solid black; /* Tarot frame */
  border-radius: 15px; /* Rounded edges */
  padding: 10px;
  background: url('../assets/images/metatroncard.jpg') no-repeat center center;
  background-size: cover; /* Ensure the image covers the entire card */
  text-align: center;
  position: relative; /* Ensures images inside are positioned relative to the card */
  display: inline-block;
  margin: 10px;
  overflow: hidden;
}

    /* Universal Image Styling */
    .tarot-card img {
      position: absolute;
      object-fit: contain;
      /* Keep aspect ratio inside frame */
    }

    /* === Individual Image Layers with Pixel-Based Controls === */

    /* Background Layer 1 (Background) */
    .tarot-card .layer1 {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: 1;
    }

    /* Middle Layer 2 (Second layer) */
    .tarot-card .layer2 {
      z-index: 2;
      /* Above background */
      width: 250px;
      /* Slightly smaller than background */
      height: auto;
      top: 170px;
      left: 150px;
      transform: translateX(-50%) scale(1.05) rotate(2deg);
      /* Centered, slightly scaled, rotated */
      opacity: 0.9;
      /* Slight transparency */
      mix-blend-mode: normal;
      /* Default blend mode */
    }

    /* Middle Layer 3 (Third layer) */
    .tarot-card .layer3 {
      position: absolute;
      z-index: 4;
      /* Above layer2 */
      width: 270px;
      /* Adjusted size to be consistent */
      height: auto;
      top: -50px;
      /* Top-left positioning */
      left: -40px;
      /* Slight padding from the edge */
      transform: scale(1.1);
      /* Slightly larger */
      opacity: 1;
      /* Ensure full visibility */
      filter: contrast(110%);
      /* Slight contrast boost */
    }


    /* Foreground Layer 4 (Fourth layer) */
    .tarot-card .layer4 {
      z-index: 4;
      /* Above main layers */
      position: absolute;
      /* width: 150px; */
      /* Adjusted for consistency */
      /* height: auto; */
      top: 115px;
      left: 107px;
      transform: translateX(-50%) scale(1.02);
      /* Scaled up */
      opacity: 0.7;
      mix-blend-mode: screen;
      /* Brightens colors */
      /* Removed blur effect */
    }

    /* Tarot Title */
    .tarot-title {
      position: absolute;
      width: 110px;
      bottom: 5px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 12px;
      font-weight: bold;
      color: white;
      text-transform: uppercase;
      padding: 3px 3px;

      z-index: 6;
      /* Always on top */
    }

    /* .sphere {
      z-index: 4;
      position: absolute;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      box-shadow: -10px -10px 20px rgba(255, 255, 255, 0.3),
        10px 10px 30px rgba(0, 0, 0, 0.7);
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    } */

    /* QR Code inside sphere */
    .sphere .qr-code {
      width: 30px;
      height: 30px;
      
      object-fit: contain;
      border-radius: 10px;
      /* Optional rounded edges */
    }

    .qr-code img{
     top: 43%;
     left: 37%;
     width: 45px;
     height: 45px;
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
        <style>
            .sphere-<?php echo $row['id']; ?> {
                background: radial-gradient(circle at 30% 30%,
                    rgba(255, 255, 255, 0.8) 10%,
                    #<?php echo htmlspecialchars($row['color1']); ?> <?php echo intval($row['percentage1']); ?>%,
                    #<?php echo htmlspecialchars($row['color2']); ?> <?php echo intval($row['percentage2']); ?>%,
                    #<?php echo htmlspecialchars($row['color3']); ?> <?php echo intval($row['percentage3']); ?>%
                );
            }
        </style>

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