@include('layouts.header')
@include('layouts.no-logged-users.home')
@include('layouts.footer')
{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Dashboard</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if(Auth::check())--}}
{{--                        {{Auth::user()->name}} is logged in!--}}
{{--                    @else--}}
{{--                        Guest session--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
