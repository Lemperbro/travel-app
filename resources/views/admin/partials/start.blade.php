<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('src/style.css') }}">
    <link rel="icon"  href="{{ asset('img/1.png') }}"/>
    <script src="https://cdn.tiny.cloud/1/4jfwg3ggzlzizqiuux4vs8zext690fbffche2l6rcz3j34do/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
              <style>
                .checkbox:checked {
                    /* Apply class right-0 and border-indigo-700*/
                    right: 0;
                    border-color: #4c51bf;
                }
                .checkbox:checked + .toggle-label {
                    /* Apply class bg-indigo-700 */
                    background-color: #4c51bf;
                }
    </style>
    <title>Admin Grow In</title>
</head>
<body class="dark:bg-gray-900 bg-gray-100">
    
