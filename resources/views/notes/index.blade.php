<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 40px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 32px;
            color: #222;
        }

        .create-btn {
            background: #222;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
        }

        .notes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .note-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .note-card h2 {
            font-size: 20px;
            margin-bottom: 12px;
            color: #222;
        }

        .note-card p {
            color: #666;
            line-height: 1.6;
        }

        .empty {
            text-align: center;
            color: #777;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>My Notes</h1>

            <a href="/notes/create" class="create-btn">
                + Create Note
            </a>
        </div>

        @if ($notes->count() > 0)

            <div class="notes-grid">

                @foreach ($notes as $note)

                    <div class="note-card">

                        <h2>{{ $note->title }}</h2>

                        <p>{{ $note->content }}</p>

                    <form action="/notes/{{ $note->id }}" 
                    method="POST"
                    onsubmit="return confirm('Are You sure do you want to delete this note');">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit">
                            Delete
                        </button>
                    </form>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                <p>No notes found. Create your first note!</p>
            </div>

        @endif

    </div>

</body>
</html>