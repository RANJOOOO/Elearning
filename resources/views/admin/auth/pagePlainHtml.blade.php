<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>


    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/AdminStyling/plainhtml.css') }}">
    <style>
        .ck-editor__editable_inline
        {
            height: 500px;
        }
    </style>

</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="post" action="{{ route('store.plainHtmlPage') }}">
            @csrf
            <label for="plainHtmlid"></label>
            <input type="hidden" name="plainHtmlid" value="{{$data}}">
            <label for="page_type"></label>
            <input type="hidden" name="page_type" id="lessonName" value="PlainHTML" required>
            <label for="Title">Title:</label>
            <input type="text" name="Title" id="lessonName" required>

            
            <label for="html_code">Description:</label>
            <textarea  name="html_code" id="editor" rows="1"></textarea>
            
            <label for="order">Order:</label>
            <input type="number" name="order" id="order" required>

            <button type="submit">Create Page</button>
        </form>
    </main>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ),
            {
                ckfinder:
                {
                    uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",

                }

            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>
