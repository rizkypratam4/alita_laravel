<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th scope="col">Created at</th>
      <th scope="col">Creator</th>
      <th scope="col">Updated at</th>
      <th scope="col">Updater</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($areas as $area)
      <tr>
        <td>{{ $area->code }}</td>
        <td>{{ $area->name }}</td>
        <td>{{ $area->created_at->format('d M Y') }}</td>
        <td>{{ $area->creator->name ?? '-' }}</td>
        <td>{{ $area->updated_at ? $area->updated_at->format('d M Y') : '-' }}</td>
        <td>{{ $area->updater->name ?? '-' }}</td>
        <td>
          <div class="dropdown text-center">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Action
            </button>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="{{ route('areas.edit', $area->id) }}">Edit</a>
              </li>
              <li>
                <form action="{{ route('areas.destroy', $area->id) }}" method="POST" id="delete-form-{{ $area->id }}">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="dropdown-item text-danger" onclick="confirmDelete({{ $area->id }})">Delete</button>
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
  {{ $areas->links() }}
</div>

<script>
  function confirmDelete(areaId) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel',
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete-form-' + areaId).submit();
      }
    });
  }
</script>