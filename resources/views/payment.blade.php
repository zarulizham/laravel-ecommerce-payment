<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        label {
            font-weight: 200;
            color: grey
        }

    </style>
</head>

<body>
    <div class="d-flex justify-content-center mt-5">
        <div class="col-md-5">
            @if (isset($errors) && $errors->any())
            <div class="alert alert-danger">
                {{ implode(',', $errors->all()) }}
            </div>
            @endif
            <div class="text-center">
                <h5>eCommerce</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('ecommerce.payment.auth.request') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Amount</label>
                            <input class="form-control" type="text" name="AMOUNT" value="{{ $request->amount ?? '3' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input class="form-control" type="text" name="TXN_DESC" value="{{ $request->description ?? 'Payment for X' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Reference ID</label>
                            <input class="form-control" type="text" name="reference_id" value="{{ $request->referece_id ?? '' }}">
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
