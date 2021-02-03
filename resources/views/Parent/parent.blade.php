@extends('Admin.layouts.master')

@section('title')
My School Admin Web Page | Dashboard
@endsection

@section('content')

<div class="container">          
    <div class="card" style="margin-top:100px">
        <div class="card-header">Parent List</div>

        <div class="card-body">

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered at</th>
                    <th></th>
                </tr>
                @if(!$parents->isEmpty())
                    @foreach ($parents as $parent)
                    <tr>
                        <td>{{ $parent->parent_name }}</td>
                        <td>{{ $parent->parent_email }}</td>
                        <td>{{ $parent->created_at }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <a href="{{ route('admin.admission.view', $parent->id) }}" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>                            
                    @endforeach
                @endif
                @if($parents->isEmpty())
                    <tr>
                        <td colspan="4">No users found.</td>
                    </tr>
                @endif
            </table>

            
        </div>
        
    </div>
    <span>{{ $parents->links("vendor.pagination.pag") }}</span>    
</div>

@endsection

@section('scripts')
@parent
@endsection