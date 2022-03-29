<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
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
                                            <th scope="col">title</th>
                                            <th scope="col">description</th>
                                            <th scope="col">category</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $product->id}}</th>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->categories->title }}</td>
                                            <td>{{ Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</td>
                                            <td>
                                                
                                                <a href="{{ url('/prdelete/product/'.$product->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr> 
                                    @endforeach                                
                                    </tbody>
                                </table>
                                {{ $products->links() }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add Product</div>
                                <div class="card-body">
                                    <form action="{{ route('store.product') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label"> title</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <label for="exampleInputEmail1" class="form-label">description</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        <label for="exampleInputEmail1" class="form-label">Category</label>
                                        <select class="form-select" aria-label="Default select example" name="category_id">
                                            @foreach ($categories as $categorie)
                                            <option  value="{{$categorie->id}}">{{$categorie->title}}</option>
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
