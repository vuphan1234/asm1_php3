@include('layouts.head')
<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        max-width: 300px;
        width: 100%;
        background-color: #ffffff;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .card img {
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .card img:hover {
        transform: scale(1.05);
    }

    .card-body {
        padding: 20px;
        text-align: center;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 10px;
    }

    .card-text {
        color: #666;
        margin-bottom: 10px;
    }

    .card-text.text-primary {
        color: #007bff;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .btn-info {
        background-color: #17a2b8;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-info:hover {
        background-color: #138496;
        color: white;
    }
</style>
</head>

@include('layouts.navigation')

@if(isset($books) && $books->count() > 0)
<div class="row">
    @foreach($books as $item)
    <div class="col-md-4 mb-3">
        <div class="card">
            @if($item->image_url)
            <img src="{{ asset('img/product/'. $item->image_url) }}" class="card-img-top" alt="{{ $item->title }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                <p class="card-text text-primary">{{ number_format($item->price) }} VND</p>
                <a href="/productdetail/{{ $item->slug }}" class="btn btn-sm btn-info">Xem chi tiết</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="pagination-container">
    {{ $books->appends(['query' => $query])->links() }}
</div>
@else
<div class="alert alert-info">
    Không tìm thấy sản phẩm nào phù hợp với từ khóa "{{ $query }}"
</div>
@endif

</main>
@include('layouts.end')
