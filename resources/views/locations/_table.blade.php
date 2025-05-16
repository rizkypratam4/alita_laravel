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
      @forelse ($locations as $location)
        <tr>
          <td>{{ $location->name }}</td>
          <td>{{ $location->created_at->format('d M Y') }}</td>
          <td>{{ $location->creator->name ?? '-' }}</td>
          <td>{{ $location->updated_at ? $location->updated_at->format('d M Y') : '-' }}</td>
          <td>{{ $location->updater->name ?? '-' }}</td>
          <td>
            <div class="dropdown text-center">
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Action
              </button>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="{{ route('locations.edit', $location->id) }}">Edit</a>
                </li>
                <li>
                  <form action="{{ route('locations.destroy', $location->id) }}" method="POST" id="delete-form-{{ $location->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="dropdown-item text-danger" onclick="confirmDelete({{ $location->id }})">Delete</button>
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
    {{ $locations->links() }}
  </div>
  
  <script>
    function confirmDelete(locationId) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + locationId).submit();
        }
      });
    }
  </script>