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
      @forelse ($types as $type)
        <tr>
          <td>{{ $type->name }}</td>
          <td>{{ $type->created_at->format('d M Y') }}</td>
          <td>{{ $type->creator->name ?? '-' }}</td>
          <td>{{ $type->updated_at ? $type->updated_at->format('d M Y') : '-' }}</td>
          <td>{{ $type->updater->name ?? '-' }}</td>
          <td>
            <div class="dropdown text-center">
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Action
              </button>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="{{ route('types.edit', $type->id) }}">Edit</a>
                </li>
                <li>
                  <form action="{{ route('types.destroy', $type->id) }}" method="POST" id="delete-form-{{ $type->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="dropdown-item text-danger" onclick="confirmDelete({{ $type->id }})">Delete</button>
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
    {{ $types->links() }}
  </div>
  
  <script>
    function confirmDelete(typeId) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + typeId).submit();
        }
      });
    }
  </script>