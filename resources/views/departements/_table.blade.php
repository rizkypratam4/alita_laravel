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
      @forelse ($departements as $departement)
        <tr>
          <td>{{ $departement->name }}</td>
          <td>{{ $departement->created_at->format('d M Y') }}</td>
          <td>{{ $departement->creator->name ?? '-' }}</td>
          <td>{{ $departement->updated_at ? $departement->updated_at->format('d M Y') : '-' }}</td>
          <td>{{ $departement->updater->name ?? '-' }}</td>
          <td>
            <div class="dropdown text-center">
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Action
              </button>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="{{ route('departements.edit', $departement->id) }}">Edit</a>
                </li>
                <li>
                  <form action="{{ route('departements.destroy', $departement->id) }}" method="POST" id="delete-form-{{ $departement->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="dropdown-item text-danger" onclick="confirmDelete({{ $departement->id }})">Delete</button>
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
    {{ $departements->links() }}
  </div>
  
  <script>
    function confirmDelete(departementId) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + departementId).submit();
        }
      });
    }
  </script>