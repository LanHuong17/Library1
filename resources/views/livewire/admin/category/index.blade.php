<div>

<div class="row">
    <div class="col-md-12">

        @if (session('message'))
            <div class="alert alert-success">{{ (session('message')) }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Category
                    <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end">Add category</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status == '1' ? 'Hidden':'Visible'}}</td>
                                    <td>{{ $category->image }}</td>
                                    <td>
                                        <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-success">Edit</a>
                                        <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                    </td>
                                    <td>{{ $category->action }}</td>
            
                                </tr>
                                
                            @endforeach
                            {{ $categories->links('pagination::bootstrap-5') }}
                        </tbody>
                    </thead>
                </table>
                
                <div>

                </div>
                {{-- {{ $categories->links() }} --}}
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroyCategory">
            <div class="modal-body">
                <h6>Are you sure?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
        </form>
            
      </div>
    </div>
  </div>

</div>
