<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5>{{ $title }}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    @isset($breadcrumbs)
                        @foreach ($breadcrumbs as $breadcrumb)
                            @if ($loop->last)
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $breadcrumb['name'] }}
                                </li>
                            @else
                                <li class="breadcrumb-item">
                                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endisset
                
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
