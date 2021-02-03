@extends('Admin.layouts.master')

@section('title')
My School Admin Web Page | Dashboard
@endsection

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top:100px">
                    <div class="card-header">Users List to Approve</div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <tr>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Registered at</th>
                                <th></th>
                            </tr>
                            @if(!$unapproveParents->isEmpty())
                                @foreach ($unapproveParents as $unapproveParent)
                                <tr>
                                    <td>{{ $unapproveParent->parent_name }}</td>
                                    <td>{{ $unapproveParent->parent_email }}</td>
                                    <td>{{ $unapproveParent->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.admission.view', $unapproveParent->id) }}" class="btn btn-primary btn-sm">View</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.admission.approve', $unapproveParent->id) }}" class="btn btn-primary btn-sm">Approve</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.admission.reject', $unapproveParent->id) }}" class="btn btn-primary btn-sm">Reject</a>
                                        </td>
                                    </tr>                            
                                @endforeach
                            @endif
                            @if($unapproveParents->isEmpty())
                                <tr>
                                    <td colspan="4">No users found.</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@parent
@endsection