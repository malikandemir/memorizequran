@extends('layouts.app')

@section('content')
    <style>
        .grid-container {
            display: grid;
            grid-template-areas:
                'auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto';
            grid-gap: 2px;
            background-color: #2196F3;
            padding: 2px;
        }

        .grid-container > div {
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
            padding: 2px 0;
            font-size: 12px;
        }
    </style>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('mainpage.memorizequran') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                            <div>
                                <div class="p-6">
                                    <div class="ml-12">
                                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                            <form method="post" action="/memorized" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <button type="submit"
                                                        class="btn btn-success btn-lg" >
                                                     {{ $memorizePage->page_number }}. Sayfayı Ezbere Okudum
                                                </button>
                                            </form>
                                            @foreach ($memorizedPagesGroup as  $memorizedPageGroup)
                                                @if($memorizedPageGroup->status == 'M')
                                                    Ezbere okunan sayfa adedi: {{$memorizedPageGroup->total}}
                                                @elseif($memorizedPageGroup->status == 'N')
                                                    Ezberlenmeyen sayfa adedi: {{$memorizedPageGroup->total}}
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="ml-12">
                                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                            <div class="grid-container">
                                                @foreach ($memorizedPages as  $memorizedPage)
                                                    @if($memorizedPage->status == 'M')
                                                        <div class="grid-item"
                                                             style="background-color: green;">{{ $memorizedPage->page_number }}</div>
                                                     @elseif($memorizedPage->status == 'W')
                                                            <div class="grid-item"
                                                                 style="background-color: yellow;">{{ $memorizedPage->page_number }}</div>
                                                    @else
                                                        <div class="grid-item">{{ $memorizedPage->page_number }}</div>
                                                    @endif

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection
