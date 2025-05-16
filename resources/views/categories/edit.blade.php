<x-layout>
    <x-breadcrumb title="Edit categories" />
      <div class="row">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Edit category</h5>
              </div>
              <div class="card-body">
                @include('categories._form', [
                    'action' => route('categories.update', $category),
                    'method' => 'PUT',
                    'category' => $category,
                ])
              </div>
            </div>
          </div>
          <!-- [ area-page ] end -->
        </div>
  </x-layout>
