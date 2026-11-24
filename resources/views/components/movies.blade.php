
@extends('templates.index')

@section('content')

<div class="browse">
    <div class="container">

        {{-- Judul halaman --}}
        <div class="agileinfo-genre">
            <h2>
                @if(isset($genreFilm) && $genreFilm)
                    {{ $genreFilm->name }}
                @else
                    List Of Movies
                @endif
            </h2>
        </div>

        {{-- Form pencarian --}}
        <div class="row" style="margin: 25px 0;">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{ route('movies') }}" method="GET">
                    <div class="input-group">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari judul film..."
                            value="{{ request('search') }}"
                        >

                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i> Cari
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

        {{-- Daftar film --}}
        <div class="browse-inner">
            <div class="col-md-12">
                <div class="browse-agile-w3ls general-w3ls">

                    <div class="tittle-head">
                        <h4 class="latest-text">
                            @if(request('search'))
                                Hasil Pencarian: {{ request('search') }}
                            @else
                                Daftar Film
                            @endif
                        </h4>
                        <div class="container">
                            <div class="agileits-single-top">
                                <ol class="breadcrumb">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li class="active">Movies</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="browse-inner">
                            <div class="bs-example bs-example-tabs" role="tabpanel">
                                <div class="clearfix"></div>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="agile-news-table">
                                            <div class="agileinfo-news-top-grids">
                                                <div class="w3_agileits-news-t-grid">

                                                    @forelse($films as $film)
                                                        <div class="col-md-2 w3l-movie-gride-agile">
                                                            <a href="{{ route('movies.show', $film->id) }}" class="hvr-shutter-out-horizontal">
                                                                <img
                                                                    src="{{ asset($film->poster) }}"
                                                                    title="{{ $film->title }}"
                                                                    class="img-responsive"
                                                                    alt="{{ $film->title }}"
                                                                >
                                                                <div class="w3l-action-icon">
                                                                    <i class="fa fa-play"></i>
                                                                </div>
                                                            </a>

                                                            <div class="mid-1">
                                                                <div class="w3l-movie-text">
                                                                    <h6>
                                                                        <a href="{{ route('movies.show', $film->id) }}">
                                                                            {{ $film->title }}
                                                                        </a>
                                                                    </h6>
                                                                </div>

                                                                <div class="mid-2">
                                                                    <p>{{ $film->year }}</p>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="col-md-12 text-center">
                                                            <h4>Film tidak ditemukan.</h4>
                                                            <p>Coba gunakan judul film lainnya.</p>
                                                        </div>
                                                    @endforelse

                                                    <div class="clearfix"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pagination --}}
                    <div class="clearfix"></div>
                    <div class="text-center">
                        {{ $films->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
