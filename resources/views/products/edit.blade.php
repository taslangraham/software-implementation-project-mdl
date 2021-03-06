@extends('layouts.dashboard')

@section('title')
    Product/Edit
@endsection

@section('content')
    <div class="container-fluid">
        
        <div class="row">
            <div class="card col col-lg-10 col-lg-offset-1 box-body"
                 style=" background-color: white; border-radius: 25px">
                <div class="card-header"><h1 class="jumbotron-fluid">Edit Product</h1>
                </div>
                
                <div class="card-body">
                    @if (count($errors) > 0)
                        
                        <div class="alert alert-danger">
                            
                            <strong>Whoops!</strong> There were some problems with your input.
                            
                            <ul>
                                
                                @foreach ($errors->all() as $error)
                                    
                                    <li>{{ $error }}</li>
                                
                                @endforeach
                            
                            </ul>
                        
                        </div>
                    
                    @endif
                    
                    <div class="row">
                        <img
                                class="align-content-center"
                                src="{{asset($product->image_path.'/'.$product->image_name)}}"
                                alt=""
                                style="height: 200px; margin-left: 50%; transform:translate(-50%);"
                        />
                    
                    </div>
                    <form action="{{route('product.update',['id'=>$product->id])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <div class="col col-lg-6">
                                <label for="#name">Name</label>
                                <input class='form-control' id='name' type="text" name="name"
                                       value="{{$product->name}}">
                            </div>
                            <div class="col col-lg-3">
                                <label for="#name">Quantity</label>
                                <input class='form-control' id='quantity' type="number" min="1" name="quantity"
                                       value="{{$product->quantity}}">
                            </div>
                            
                            <div class="col col-lg-3">
                                <label for="price">Price</label>
                                <input class='form-control' id='price' type="number" min="1" name="price"
                                       value="{{$product->price_per_unit}}"
                                >
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col col-lg-6">
                                <label for="weight">Weight (Pounds)</label>
                                <input type="number"  id="weight" class="form-control" min="0.1" name="weight"
                                       value="{{$product->weight}}">
                            </div>
                            <div class="col col-lg-6">
                                <label for="image">Upload Image</label>
                                <input type="file" accept="image/x-png,image/jpeg" class="form-control col col-lg-6"
                                       name="image">
                            </div>
                        </div>
                        
                        <div class="form-group" style="margin-top: 15px;">
                            <div class="col col-lg-12">
                                <label for="">Description</label>
                                <textarea class=" form-control" name="description">{{$product->description}}</textarea>
                            </div>
                        
                        </div>
                        <br/>
                        
                        <div class="form-group">
                            <div class="col col-lg-4">
                                <button class="btn btn-warning" type="submit" style="margin-top: 15px;">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


