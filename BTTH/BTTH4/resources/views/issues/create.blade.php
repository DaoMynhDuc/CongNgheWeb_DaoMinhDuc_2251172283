<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Thêm Sự Cố Mới</title>
</head>
<body>

<h1 style="margin: 50px 50px">Thêm Sự Cố Mới</h1>
<form action="{{ route('issues.store') }}" method="POST" style="margin: 50px 50px">
    @csrf
    <div class="mb-3">
        <label for="computer_id" class="form-label">Tên máy tính:</label>
        <select name="computer_id" class="form-control" required>
            <option value="">-- Chọn máy tính --</option>
            @foreach($computers as $computer)
                <option value="{{ $computer->id }}">
                    {{ $computer->computer_name }} - {{ $computer->model }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="reported_by" class="form-label">Người báo cáo sự cố</label>
        <input type="text" class="form-control" id="reported_by" name="reported_by" required>
    </div>
    <div class="mb-3">
        <label for="reported_date" class="form-label">Thời gian báo cáo</label>
        <input type="date" class="form-control" id="reported_date" name="reported_date" required>
    </div>

    <div class="mb-3">
        <label for="urgency" class="form-label">Mức độ sự cố</label>
        <select class="form-control" id="urgency" name="urgency" required>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Trạng thái</label>
        <select class="form-control" id="status" name="status" required>
            <option value="Open">Open</option>
            <option value="In Progress">In Progress</option>
            <option value="Resolved">Resolved</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

</body>
</html>
