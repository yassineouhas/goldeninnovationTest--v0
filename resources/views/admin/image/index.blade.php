<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Images
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{session('success')}}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
                                <div class="card-header">All Products</div>
                            
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL No</th>
                                            <th scope="col">name</th>
                                            <th scope="col"width="10%">path</th>
                                            <th scope="col">size</th>
                                            <th scope="col">product</th>
                                            <th scope="col">Created At</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($images as $image)
                                        <tr>
                                            <th scope="row">{{ $image->id}}</th>
                                            <td>{{ $image->name }}</td>
                                            <td width="10%">{{ $image->path }}</td>
                                            <td>{{ $image->size }}</td>
                                            <td>{{ $image->products->title }}</td>
                                            <td>{{ Carbon\Carbon::parse($image->created_at)->diffForHumans() }}</td>
                                            
                                        </tr> 
                                    @endforeach                                
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add Image</div>
                                <div class="card-body">
                                    <form action="{{ route('store.image') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <label for="exampleInputEmail1" class="form-label">path</label>
                                        <input type="text" name="path" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <label for="exampleInputEmail1" class="form-label">size</label>
                                        <input type="text" name="size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <label for="exampleInputEmail1" class="form-label">Product</label>
                                        <select class="form-select" aria-label="Default select example" name="product_id">
                                            @foreach ($products as $product)
                                            <option  value="{{$product->id}}">{{$product->title}}</option>
                                            @endforeach
                                          </select>
                                        
                                        </div>

                                        @if ($errors->any())
                                            <div class="text-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <button type="submit" class="btn btn-primary">Add Product</button>
                                    </form> 
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div> 
            
        </div>
    </div>
    {{-- Trash List --}}
    
</x-app-layout>
