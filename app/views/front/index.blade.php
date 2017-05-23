@extends('front.main')

@section('title')
    SYNC
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('partials.front.featured')
        </div>

        <div class="col-md-4">
            @include('partials.front.weather')
        </div>
    </div>

<div class="row">
    <div id="ws-carousel" class="col-md-4 carousel slide">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <a href="{{ route('workshops') }}" class="panel-title pull-left">
                    <span class="glyphicon glyphicon-cog pull-left">&nbsp;</span>
                    Workshops
                </a>
                @if(ceil(count($workshops) / 3) > 1)
                    <ol class="carousel-indicators pull-right">
                        @for($i = 0; $i < (ceil(count($workshops) / 3)); $i++)
                            @if($i === 0)
                                <li data-target="#ws-carousel" class="active" data-slide-to="{{ $i }}"></li>
                            @else
                                <li data-target="#ws-carousel" data-slide-to="{{ $i }}"></li>
                            @endif
                        @endfor
                    </ol>
                @endif
            </div>
                <div class="carousel-inner">
                    <?php $i = 0; $first = true;?>
                    @foreach($workshops as $item)
                        @if($first === true)
                            <?php $first = false; ?>
                            <div class="item active">
                        @elseif($i === 0)
                            <div class="item">
                        @endif
                            <section class="list-group-item">
                                <h1 class="list-group-item-heading ellipsis">
                                    {{ link_to_route('workshops', $item->title, array($item->id, $item->webTitle)) }}
                                </h1>
                                <p class="index-excerpt">
                                    {{ $item->excerpt }}
                                </p>
                                <p class="list-group-item-footer">
                                    @if($item->is_featured)
                                        <i class="glyphicon glyphicon-star"></i>
                                    @endif
                                    {{ $item->created_at->format('H:i, d M') }}
                                </p>
                            </section>
                        @if($i === 2)
                            </div>
                            <?php $i = -1; ?>
                        @endif
                        <?php $i++; ?>
                    @endforeach
                    @if(count($workshops) % 3 !== 0)
                       <?php $i = 3 - (count($workshops) % 3); ?>
                            @for(; $i > 0; $i--)
                                <section class="list-group-item">
                                    <h1 class="list-group-item-heading">&nbsp;</h1>
                                    <div class="screen-excerpt"></div>
                                </section>
                            @endfor
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('calls') }}" class="panel-title">
                        <span class="glyphicon glyphicon-warning-sign pull-left">&nbsp;</span>
                        Oproepen
                    </a>
                </div>
                <div class="list-group">
                    @foreach($notes as $item)
                        <section class="list-group-item">
                            <h1 class="list-group-item-heading ellipsis">
                                {{ link_to_route('news', $item->title, array($item->id, $item->webTitle)) }}
                            </h1>
                            <p class="index-excerpt">
                                {{ $item->excerpt }}
                            </p>
                            <p class="list-group-item-footer">
                                @if($item->is_featured)
                                    <i class="glyphicon glyphicon-star"></i>
                                @endif
                                {{ $item->created_at->format('H:i, d M') }}
                            </p>
                        </section>
                    @endforeach
                    @if(count($notes) % 3 !== 0)
                        <?php $i = 3 - (count($notes) % 3); ?>
                        @for(; $i > 0; $i--)
                            <section class="list-group-item">
                                <h1 class="list-group-item-heading ellipsis">
                                    &nbsp;
                                </h1>
                                <div class="media-body screen-excerpt"></div>
                            </section>
                        @endfor
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('news') }}" class="panel-title">
                        <span class="glyphicon glyphicon-bullhorn pull-left">&nbsp;</span>
                        Nieuws
                    </a>
                </div>
                <div class="list-group">
                    @foreach($news as $item)
                        <section class="list-group-item">
                            <h1 class="list-group-item-heading ellipsis">
                                {{ link_to_route('news', $item->title, array($item->id, $item->webTitle)) }}
                            </h1>
                            <p class="index-excerpt">
                                {{ $item->excerpt }}
                            </p>
                            <p class="list-group-item-footer">
                                @if($item->is_featured)
                                    <i class="glyphicon glyphicon-star"></i>
                                @endif
                                {{ $item->created_at->format('H:i, d M') }}
                            </p>
                        </section>
                    @endforeach
                    @if(count($news) % 3 !== 0)
                        <?php $i = 3 - (count($news) % 3); ?>
                        @for(; $i > 0; $i--)
                            <section class="list-group-item">
                                <h1 class="list-group-item-heading ellipsis">
                                    &nbsp;
                                </h1>
                                <div class="media-body screen-excerpt"></div>
                            </section>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
        setInterval(function(){
            window.location.reload();
        }, 5 * 60 * 1000);

        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 10000
            });
        });
    </script>
@stop