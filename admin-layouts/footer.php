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