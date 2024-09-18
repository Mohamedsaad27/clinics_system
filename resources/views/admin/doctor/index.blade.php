@extends('admin.layouts.header')

<div class="container">
    <h1>Doctors List</h1>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary mb-3">Add New Doctor</a>
    
    @if($doctors->count() > 0)
        <table id="doctorsTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Specialty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->user->name }}</td>
                    <td>{{ $doctor->user->email }}</td>
                    <td>{{ $doctor->user->phone }}</td>
                    <td>{{ $doctor->department->name }}</td>
                    <td>{{ $doctor->specialty->name }}</td>
                    <td>
                        <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">No doctors found.</div>
    @endif
</div>

@push('scripts')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#doctorsTable').DataTable();
    });
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endpush
