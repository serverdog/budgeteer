
 <div class="col-{{$size}}">
 
    <div class="card shadow mb-4">
        <div class="card-header py-3 {{ $title_bg }}">
        <h6 class="m-0 font-weight-bold">{{ $title }}</h6>
        </div>
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>