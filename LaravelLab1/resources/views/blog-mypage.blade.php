<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blogs</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>My Blogs</h1>

    @if($blogs->isEmpty())
        <p>You have not created any blogs yet.</p>
    @else
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Date Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->b_title }}</td>
                    <td>{{ $blog->b_content }}</td>
                    <td>{{ $blog->dateCreated }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
