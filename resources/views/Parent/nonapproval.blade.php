@extends('Parent.layouts.master')

@section('title')
My School Web App | Portal
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card" style="margin-top:100px">
                <div class="card-header">Waiting for Approval</div>
                <div class="card-body">
                    Your account is waiting for our administrator approval.
                    <br />
                    Check your Mail soon as you will be notify when your admission form has been approved.
                    <br />
                    Please check back later.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
  <script>
    $('#body').css('background-color','purple')
  </script>
@parent
@endsection