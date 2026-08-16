<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Note</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            color: #000;
        }

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .form-card h1 {
            font-size: 30px;
            margin-bottom: 8px;
            color: #222;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #555;
        }

        .form-group textarea {
            min-height: 180px;
            resize: vertical;
        }

        .error-box {
            background: #fff1f1;
            border: 1px solid #f0b5b5;
            color: #c0392b;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .error-box ul {
            padding-left: 20px;
        }

        .error-box li {
            margin-bottom: 5px;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 10px;
        }

        .cancel-btn,
        .submit-btn {
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .cancel-btn {
            background: #eee;
            color: #333;
        }

        .submit-btn {
            background: #222;
            color: white;
        }

        .submit-btn:hover {
            background: #444;
        }
    </style>
</head>

<body>

    <div class="container">

        <a href="/notes" class="back-link">
            ← Back to Notes
        </a>

        <div class="form-card">

            <h1>Create New Note</h1>

            <p class="subtitle">
                Write down something you want to remember.
            </p>

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/notes" method="POST">

                @csrf

                <div class="form-group">
                    <label for="title">Title</label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="Enter note title"
                        value="{{ old('title') }}"
                    >
                </div>

                <div class="form-group">
                    <label for="content">Content</label>

                    <textarea
                        id="content"
                        name="content"
                        placeholder="Write your note here..."
                    >{{ old('content') }}</textarea>
                </div>

                <div class="button-container">

                    <a href="/notes" class="cancel-btn">
                        Cancel
                    </a>

                    <button type="submit" class="submit-btn">
                        Create Note
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>
</html>