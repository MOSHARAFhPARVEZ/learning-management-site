@extends('admin\admin_dashboard')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<style>
    .form-check-label{
        text-transform: capitalize;
    }
</style>


<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Role & Permission</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Role Add Permission</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">

<form action="{{ route('update.permission.add.role',$role->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
    @csrf


            <div class="col-md-6">

                <label for="input1" class="form-label">Role Name</label>
                <h4>{{ $role->name }}</h4>
            </div>


            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckMain">
                <label class="form-check-label" for="flexCheckMain">Permission All</label>
            </div>

            <hr>


            @foreach ($permissions_Groups as $group)

            <div class="row">
                <div class="col-3">

        @php
            $permissions = App\Models\User::permissionByGroup($group->group_name);
        @endphp

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" {{ App\Models\User::roleHasPermission($role,$permissions) ? 'checked' : '' }} >
                        <label class="form-check-label" for="flexCheckDefault">{{ $group->group_name }}</label>
                    </div>
                </div>

                <div class="col-9">




                    @foreach ($permissions as $permission)

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission_id[]" id="CheckDefault{{ $permission->id }}" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} >

                        <label class="form-check-label" for="CheckDefault{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>

                    @endforeach
        <br>
                </div>
            </div>

            @endforeach

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Add</button>
                    </div>
                </div>
</form>
        </div>
    </div>

</div>

<script>
    $('#flexCheckMain').click(function(){
        if ($(this).is(':checked')) {
            $('input[ type=checkbox]').prop('checked',true)
        }else{
            $('input[ type=checkbox]').prop('checked',false)
        }
    });
</script>




@endsection
