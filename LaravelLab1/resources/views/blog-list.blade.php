<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Blog List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Date Created</th>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->b_title }}</td>
                <td>{{ $blog->b_content }}</td>
                <td>{{ $blog->author }}</td>
                <td>{{ $blog->dateCreated }}</td>
                <td><button> <a href="{{route('blog.show', ['id'=>$blog['id']])}}">Show</a> </button></td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $blogs->links() }}

    <h2>Create a New Blog Post</h2>
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control">
        </div>
        <div class="form-group">
            <label for="b_title">Title</label>
            <input type="text" name="b_title" id="b_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="b_content">Content</label>
            <textarea name="b_content" id="b_content" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
