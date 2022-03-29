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
                                <div class="card-header">All Category</div>
                            
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL No</th>
                                            <th scope="col">Category title</th>
                                            
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <th scope="row">{{ $category->id}}</th>
                                                <td>{{ $category->title }}</td>
                                                
                                                <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                                    <a href="{{ url('/pdelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr> 
                                        @endforeach                                 
                                    </tbody>
                                </table>
                                {{ $categories->links() }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add Category</div>
                                <div class="card-body">
                                    <form action="{{ route('store.category') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Category name</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                                        <button type="submit" class="btn btn-primary">Add Category</button>
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
