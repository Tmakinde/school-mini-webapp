@extends('Admin.layouts.master')

@section('title')
My School Admin Web Page | Dashboard
@endsection

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users List to Approve</div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Registered at</th>
                                <th></th>
                            </tr> 
                            @forelse ($unapproveParents as $unapproveParent)
                                <tr>
                                    <td>{{ $unapproveParent->name }}</td>
                                    <td>{{ $unapproveParent->email }}</td>
                                    <td>{{ $unapproveParent->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.approve', $unapproveParent->id) }}" class="btn btn-primary btn-sm">View</a>
                                    </td>     
                                    <td>
                                        <a href="{{ route('admin.users.approve', $unapproveParent->id) }}" class="btn btn-primary btn-sm">Approve</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No users found.</td>
                                </tr>
                            @endforelse
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