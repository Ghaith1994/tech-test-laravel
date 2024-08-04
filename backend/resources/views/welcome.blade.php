<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tech test</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
<div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
            <span class="fs-4">Articles</span>
        </a>
    </header>

    <div class="mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-2" id="article-table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">content</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.7.1.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "api/v1/articles",
            success: function (response) {
                response.data.forEach(function(article) {
                    $('#article-table tbody').append($(`<tr><td>${article.title}</td><td>${article.content}</td><td><img alt="img" class="img-thumbnail" src="https://tech-test-1234.s3.us-east-2.amazonaws.com/article.jpg" /></td></tr>`));
                });
            }
        });
    });
</script>
</body>
</html>
