<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi-Language Laravel</title>
</head>

<body>
    <div>
        <h2 id='content' data-original-text="{{ __('Welcome to the Multi-Language Laravel App') }}">
            {{ __('Welcome to the Multi-Language Laravel App') }}
        </h2>
    </div>
    <div>
        <select id="lang-selector">
            <option value="en">English</option>
            <option value="fr">French</option>
            <option value="es">Spanish</option>
            <option value="pt">Portuguese</option>
        </select>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        $(document).ready(function() {
            $('#lang-selector').change(function() {
                var targetLang = $(this).val();
                var sourceLang = '{{ app()->getLocale() }}';
                var originalText = $('#content').data('original-text');

                $.ajax({
                    url: '/translate',
                    cache: false,
                    type: 'GET',
                    data: {
                        source_lang: sourceLang,
                        target_lang: targetLang,
                        text: originalText,
                    },
                    success: function(response) {
                        $('#content').html(response);
                    }
                });
            });
        });
    </script>
</body>

</html>
