<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{$page->title}}
    @foreach (\App\Models\MenuItem::getTree(); as $item)
  <a class="no-underline hover:underline p-3"
     href="{{$item->url()}}">
     {{ $item->name }}
  </a> 
@endforeach 
</body>
</html>