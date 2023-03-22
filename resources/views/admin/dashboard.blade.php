@extends('admin.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb m-3">
            <div class="pull-left">
                <h2>Quản lý sản phẩm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{asset('')}}admin/create"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Author</th>
            <th>Description</th>
            <th>Rate</th>
            <th>Price</th>
            <th>Promote</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->book_name}}</td>
            <td>{{$item->author}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->rate}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->promote}}</td>
            <td>
                <form action="{{asset('')}}destroy/{{$item->id}}" method="POST">   
                    <a class="btn btn-info" href="{{asset('')}}admin/{{$item->id}}">Show</a>    
                    <a class="btn btn-primary" href="{{asset('')}}admin/{{$item->id}}/edit">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $items->links() !!}
      
@endsection