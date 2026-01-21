<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slideshows</title>
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
            line-height: 1.6;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 5px;
            transition: background 0.2s;
        }
        li:hover {
            background: #f0f0f0;
        }
        a {
            color: #0066cc;
            text-decoration: none;
            font-size: 1.1em;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Slideshows</h1>
    <ul>
        @foreach ($slides as $slide)
        <li><a href="{{ $slide['route'] }}">{{ $slide['title'] }}</a></li>
        @endforeach
    </ul>
</body>
</html>
