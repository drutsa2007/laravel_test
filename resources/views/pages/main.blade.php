<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <style>
        .show {
            display: block;
        }
        .hide {
            display: none;
        }
    </style>
</head>
    <body>
        <div id="a1">{!! $text !!}</div>

        <script type="text/javascript" src="/jquery-3.6.0.min.js"></script>
        <script>
            $('.showUL').on('click', function() {
                $('> ul', this).slideToggle()
                if($('> b', this).text() === '-') $('> b', this).text("+")
                else $('> b', this).text("-")
                return false
            });
        </script>
    </body>
</html>
