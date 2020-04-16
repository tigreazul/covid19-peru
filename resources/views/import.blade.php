<!DOCTYPE html>
<html>
<head>
    <title>Import data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
    
    <div class="container">
        <div class="row">

            <div class=" col-6">
                <div class="card">
                    <div class="card-header"> <b>Ubigeo</b></div>
                    <div class="card-body">
                        <form action="{{ route('data.ubigeo') }}" method="POST" name="importform" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control" accept=".csv" required>
                            TOTAL: {{$ubigeo}}
                            <hr>
                            <button class="btn btn-success">Import Ubigeo</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header"> <b>Data Peru</b></div>
                    <div class="card-body">
                        <form action="{{ route('data.peru') }}" method="POST" name="importform" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control" accept=".csv" required>
                            TOTAL: {{$data}}
                            <hr>
                            <button class="btn btn-success">Import Data Peru</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header"> <b>Hospitalizacion</b></div>
                    <div class="card-body">
                        <form action="{{ route('data.hospitalizacion') }}" method="POST" name="importform" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control" accept=".csv" required>
                            TOTAL: {{$hospital}}
                            <hr>
                            <button class="btn btn-success">Import Hospitalizacion</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header"> <b>Test Resultado</b></div>
                    <div class="card-body">
                        <form action="{{ route('data.test_result') }}" method="POST" name="importform" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control" accept=".csv" required>
                            TOTAL: {{$test}}
                            <hr>
                            <button class="btn btn-success">Import Test Resultado</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
        
    <style>
        .card{
            margin:10px
        }
    </style>
</body>
</html>