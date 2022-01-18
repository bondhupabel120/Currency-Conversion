@extends('backend.master')

@section('title')
    Sene Money | {{ $appName }}
@endsection

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>Send Money</h3>
                </div>
                <div class="module-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form action="{{ route('save.send.money') }}" method="POST" class="form-horizontal row-fluid">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Amount <span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="number" min="1" name="amount" id="amount" onchange="moneyCheck(this.value)" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('amount') ? $errors->first('amount') : '' }}</span>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Users <span class="text-red">*</span></label>
                            <div class="controls">
                                <select name="user_id" tabindex="1" class="span8">
                                    <option selected disabled>Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-red">{{ $errors->has('user_id') ? $errors->first('user_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button id="submit_btn" type="submit" class="btn">Send Money</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .text-red{
            color: red;
        }
    </style>
@endsection

@section('js')
    @include('backend.conversion.send_money_js')
@endsection
