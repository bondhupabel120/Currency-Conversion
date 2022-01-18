@extends('backend.master')

@section('title')
    Home | {{ $appName }}
@endsection

@section('content')
    <div class="span9">
        <div class="content">
            <div class="btn-controls">
                <div class="btn-box-row row-fluid">
                    <a href="javascript:void(0);" class="btn-box big span4"><i class="icon-money"></i><b>{{ $current_balance->wallet ?? 0 }} {{ $current_balance->currency }}</b>
                        <p class="text-muted">
                            Your Current Balance
                        </p>
                    </a><a href="javascript:void(0);" class="btn-box big span4"><i class="icon-money"></i><b>{{ $total_send_money ?? 0 }} {{ $current_balance->currency }}</b>
                        <p class="text-muted">
                            Total Send Money
                        </p>
                    </a><a href="javascript:void(0);" class="btn-box big span4"><i class="icon-money"></i><b>{{ $total_receive_money ?? 0 }} {{ $current_balance->currency }}</b>
                        <p class="text-muted">
                            Total Receive Money
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <!--/.content-->
    </div>
@endsection
