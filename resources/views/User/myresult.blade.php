@extends('User.layouts.master')

@section('title')
My School Admin Web App | Portal
@endsection

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Test</th>
      <th scope="col">Exam</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
<a href="{{ route('download-result') }}">Download PDF</a>
@endsection
@section('scripts')
@parent
@endsection
