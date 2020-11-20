<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button onmouseover="fetchData()" onmouseout="removeData()">Load Data</button>
    <div id="other-info"></div>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script>
        function fetchData() {
            $.ajax({
                url: 'http://localhost/crude/mydata.php',
                method: 'GET',
                success: function(response) {
                    $('#other-info').html(response);
                },
                error: function(dataError) {

                }
            });
        }

        function removeData() {
            $('#other-info').html('');
        }
    </script>
</body>

</html>