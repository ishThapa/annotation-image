<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://unpkg.com/markerjs2/markerjs2.js"></script>
    <title>Annotate Image</title>
</head>

<body>
    <div class="container">
        <div>
            <nav class="navbar navbar-light bg-dark">
                <form class="container-fluid">
                    <a href="{{ route('add') }}"> <button class="btn btn-outline-success me-2"
                            type="button">Add Records</button></a>
                    <a href="{{ route('view') }}"> <button class="btn btn-outline-primary me-2"
                            type="button">View Records</button></a>
                </form>
            </nav>
        </div>
        
        @yield('content')
    </div>

</body>

</html>
