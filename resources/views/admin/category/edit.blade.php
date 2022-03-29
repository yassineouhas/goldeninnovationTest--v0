<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
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
                                <div class="card-header">Edit Category</div>
                                <div class="card-body">
                                    <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Update category name</label>
                                        <input type="text" name="title" class="form-control" value="{{ $categories->title }}"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
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
                                        <button type="submit" class="btn btn-primary">Update Category</button>
                                    </form> 
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div> 
            
        </div>
    </div>
</x-app-layout>
