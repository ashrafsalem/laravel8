<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
        <div class="py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                        </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                All Categories
                            </div>
                            <div class="card-body">
                                  <table class="table table-hover table-striped table-bordered border-primary table-responsive">
                                     <thead>
                                         <th scope="col">Ser. NO</th>
                                         <th scope="col">ID</th>
                                         <th scope="col">Category Name</th>
                                         <th scope="col">Added By </th>
                                         <th scope="col">Created At</th>
                                     </thead>
                                     <tbody>
                                         @foreach($cats as $cat)
                                            <tr>
                                                <th scope="row"> {{ $cats->firstItem()+$loop->index }}</th>
                                        
                                                <td>{{ $cat->id }}</td>
                                                <td>{{ $cat->category_name }}</td>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ Carbon\Carbon::parse($cat->created_at)->diffForHumans() }}</td>
                                            </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                                 {{ $cats->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Add Category
                            </div>
                            <div class="card-body">
                                <form class="form" action="{{ route('add.category') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input type="text" name="category_name" id="category_name" class="form-control">
                                        @error('category_name')
                                            <span class="badge bg-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="form-control" value="Add Category">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     

</x-app-layout>
