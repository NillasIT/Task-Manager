<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .form-container {
            width: 100%;
            max-width: 800px;
            padding: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        form input,
        form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 16px;
            background: none;
            border: none;
            border-bottom: 1px solid #ccc; /* Linha inferior opcional */
            outline: none;
            color: #333;
            font-weight: 600;
        }

        form input::placeholder,
        form textarea::placeholder {
            color: #bbb;
            font-style: italic;
        }

        form textarea {
            height: 180px;
            resize: none;
        }
    </style>
</head>

<body>
    <nav></nav>

    <div class="mx-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>type
        @endif
    </div>

    <div class="container">
        <div class="form-container">
            <form action="{{ route('task.store')}}" method="POST">
                @csrf <!--Token de Segurança-->
                
                <div class="mb-3">
                    <label for="title" class="form-label"><b>Title</b></label>
                    <input type="text" name='title' class="form-control" placeholder="Type the title of the task" value="{{ old('title')}}">
                </div>

                <div class="mb-3">
                    <textarea name="description" id="description" cols="125" rows="10" placeholder="Type the description of your task"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</body>
</html>