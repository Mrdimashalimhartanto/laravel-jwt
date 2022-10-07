<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">body</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($response as $data)
            <tr>
                <td>{{$data['title']}}</td>
                <td>{{$data['order_id']}}</td>
                <td>{{$data['no_polis']}}</td>
                <td>
                    <a href="{{ route('post.edit', $data['id'])}}">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>