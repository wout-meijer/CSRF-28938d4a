<html>
<head>
    <title>Leaky-Guestbook</title>
    <style>
        body {
            width: 100%;
        }

        .body-container {
            background-color: aliceblue;
            width: 200px;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
            padding-left: 100px;
            padding-right: 100px;
        }

        .heading {
            text-align: center;
        }
    </style>
    <script type="application/javascript">
        function sendCSRF() {
            var formData = new FormData();
            formData.append('email', document.querySelector('input[name=\"email\"]').value);
            formData.append('text', 'CSRF heeft me te pakken');
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function () {
                if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
                    alert('CSRF heeft je te pakken, neem een kijkje in het reguliere gastenboek');
                }
            };
            xmlHttp.open("post", "guestbook.php");
            xmlHttp.send(formData);
        }
    </script>
</head>
<body>
<div class="body-container">
    <h1 class="heading">Gastenboek 'De lekkage'</h1>
    <form>
        Email: <input type="email" name="email"><br/>
        <input type="hidden" value="red" name="color">
        Bericht: <textarea name="notyourtext" minlength="4"></textarea><br/>
        <input type='button' value="submit" onclick="sendCSRF()">
    </form>
    <hr/>
</div>
</body>
</html>