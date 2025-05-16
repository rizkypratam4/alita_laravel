<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Created at</th>
        <th scope="col">Creator</th>
        <th scope="col">Updated at</th>
        <th scope="col">Updater</th>
        <th scope="col" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($brands as $brand)
        <tr>
          <td>{{ $brand->name }}</td>
          <td>{{ $brand->created_at->format('d M Y') }}</td>
          <td>{{ $brand->creator->name ?? '-' }}</td>
          <td>{{ $brand->updated_at ? $brand->updated_at->format('d M Y') : '-' }}</td>
          <td>{{ $brand->updater->name ?? '-' }}</td>
          <td>
            <div class="dropdown text-center">
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Action
              </button>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="{{ route('brands.edit', $brand->id) }}">Edit</a>
                </li>
                <li>
                  <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" id="delete-form-{{ $brand->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="dropdown-item text-danger" onclick="confirmDelete({{ $brand->id }})">Delete</button>
                  </form>
                </li>
              </ul>
            </div>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center">No results found.</td></tr>  
      @endforelse
    </tbody>
    
  </table>
  
  <div class="d-flex justify-content-end">
    {{ $brands->links() }}
  </div>
  
  <script>
    function confirmDelete(brandId) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + brandId).submit();
        }
      });
    }
  </script>