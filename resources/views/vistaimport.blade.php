<!DOCTYPE html>
<html>
<head>
    <title>Laravel 6 Import Export Excel to database - Tuts Make</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
    
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Reporte General
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" name="importform" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required>
                <br>
                <button class="btn btn-success">Import File</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="card mt-4">
        <div class="card-header"> <b>CONFIRMADO</b></div>
        <div class="card-body">
            <form action="{{ route('historial.confirmado') }}" method="POST" name="importform" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required>
                <br>
                <button class="btn btn-success">Import Confirmados</button>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header"><b>RECUPERADO </b></div>
        <div class="card-body">
            <form action="{{ route('historial.recuperado') }}" method="POST" name="importform" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required>
                <br>
                <button class="btn btn-success">Import Recuperado</button>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header"><b>MUERTE</b></div>
        <div class="card-body">
            <form action="{{ route('historial.muerte') }}" method="POST" name="importform" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required>
                <br>
                <button class="btn btn-success">Import Muerte</button>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header"><b>DEPARTAMENTO</b></div>
        <div class="card-body">
            <form action="{{ route('historial.departamento') }}" method="POST" name="importform" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required>
                <br>
                <button class="btn btn-success">Import Departamento</button>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>