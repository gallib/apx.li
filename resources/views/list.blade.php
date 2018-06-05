@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            @foreach($urls->chunk(3) as $row => $chunk)
                <div class="row">
                    @foreach($chunk as $url)
                        <div class="col-md-4 pb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase font-weight-bold">
                                        <a href="{{ route('shorturl.redirect', ['code' => $url->code]) }}" title="{{ $url->title }}">
                                            {{ $url->code }}
                                        </a>
                                    </h5>
                                    <p class="card-subtitle card-font-small mb-4 text-muted text-uppercase">Added {{ $url->created_at->diffForHumans() }}</p>
                                    <p class="card-text card-text-title">
                                        @if ($url->title)
                                            {{ $url->title }}
                                        @else
                                            <span class="font-italic text-muted">No title provided</span>
                                        @endif
                                    </p>
                                    <p class="expanded-url card-text card-font-small text-muted text-right">Expanded url: <a href="{{ $url->url }}" class="text-muted">{{ $url->url }}</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <div class="row pagination-row">
        <div class="col">
            {{ $urls->links() }}
        </div>
    </div>
</div>
@endsection
