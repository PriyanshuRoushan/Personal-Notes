<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>CREATE NEW NOTES</h2>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="/notes" method="post">
        @csrf
        <label for="">TITLE</label>
        <input type="text" placeholder="Title" name="title">
        <br><br>

        <label for="">CONTENT</label>
        <textarea type="text" name="content"></textarea>
        <br><br>
        <button type="submit">Create Note</button>
    </form>
</body>
</html>