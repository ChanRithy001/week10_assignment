<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>List</title>
  </head>
  <body>
    <table class="table container" method="GET">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">
                <a href="{{route('form_create_category')}}"
                class="btn btn-primary">create</a>
            </th>
          </tr>
        </thead>
        <tbody>
            @php
                $count=1;
            @endphp
          @foreach ($allcategories as $allcategory)
            <tr>
                <td>{{$count++}}</td>
                <td>{{$allcategory->category_name}}</td>
                <td>
                    <form action="{{route('delete_category',$allcategory->id)}}" method="post">
                        @csrf
                    <input type="hidden" name="_method" value="DELETE" >
                    <button type="submit" class="btn-sm btn-danger">Delete</button>
                    </form>

                </td>
              </tr>
            
          @endforeach
        </tbody>
      </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>