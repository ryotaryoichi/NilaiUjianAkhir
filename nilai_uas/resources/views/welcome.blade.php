<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nilai Ujian Akhir</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container {
            max-width: 1000px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ url('store-input-fields') }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Name</th>
                    <th>Nilai Quiz</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai Absensi</th>
                    <th>Nilai Praktek</th>
                    <th>Nilai UAS</th>

                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="addMoreInputFields[0][name]" placeholder="Enter name" class="form-control" />
                    </td>

                    <td><input type="integer" name="addMoreInputFields[0][nilaiQuiz]" placeholder="Nilai Quiz" class="form-control" />
                    </td>

                    <td><input type="integer" name="addMoreInputFields[0][nilaiTugas]" placeholder="Nilai Tugas" class="form-control" />
                    </td>

                    <td><input type="integer" name="addMoreInputFields[0][nilaiAbsensi]" placeholder="Nilai Absensi" class="form-control" />
                    </td>

                    <td><input type="integer" name="addMoreInputFields[0][nilaiPraktek]" placeholder="Nilai Praktek" class="form-control" />
                    </td>

                    <td><input type="integer" name="addMoreInputFields[0][nilaiUAS]" placeholder="Nilai UAS" class="form-control" />
                    </td>

                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add More</button></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-outline-success btn-block">Save</button>
        </form>
    </div>

    
</body>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][name]" placeholder="Enter subject" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +
            '][nilaiQuiz]" placeholder="Enter subject" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +
            '][nilaiTugas]" placeholder="Enter subject" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +
            '][nilaiAbsensi]" placeholder="Enter subject" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +
            '][nilaiPraktek]" placeholder="Enter subject" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +
            '][nilaiUAS]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
      
</script>
</html>