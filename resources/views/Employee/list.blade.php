@extends('layoutsddd.app')

@section('title', 'Create employee - KIT SERVICES')

@section('content')

    <div class="card mb-4 m-5">

        <div class="card-header ">
            <h3 class="card-title">Employee List</h3>
            <div class="card-tools">
                <button
                    type="button"
                    class="btn btn-tool"
                    data-lte-toggle="card-collapse"
                    title="Collapse"
                ></button>


                <button
                    type="button"
                    class="btn btn-tool"
                    title="add new employee"
                    style="
                background:#FF6600;
                color:#fff;
                width:40px;
                height:40px;
            "
                >
                    <a href="{{ route('employee.create') }}" class="text-decoration-none"
                       style="color: white; font-size: 20px">
                        <i class="bi bi-plus-lg"></i>
                    </a>
                </button>

            </div>
        </div>

        <div class="card-body">


            <div class="row mb-3">
                <div class="col-md-4">
                    <input
                        type="text"
                        id="searchEmployee"
                        class="form-control"
                        placeholder="Search by Employee and full name"
                    >
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-nowrap">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Age</th>
                        <th>Salary</th>
                        <th>Hire Date</th>

                        <th>Contract</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>


                    <tbody id="employeeTable">

                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration}}</td>

                            <td>
                                <div class="d-flex align-items-center gap-2">

                                    @php

                                        $initials = strtoupper(substr($employee->first_name,0,1) . substr($employee->last_name,0,1));

                                        $bgColor = '#ff7f00';
                                    @endphp

                                    @if($employee->photo)
                                        <img src="{{ asset('storage/'.$employee->photo) }}"
                                             alt="Photo"
                                             class="rounded-circle"
                                             width="45"
                                             height="45">
                                    @else
                                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                                             style="width:45px; height:45px; background-color: {{ $bgColor }}; color:white; font-weight:bold; font-size:16px;">
                                            {{ $initials }}
                                        </div>
                                    @endif


                                    <div>
                                        <strong>{{ $employee->first_name }}</strong><br>
                                        <small class="text-muted">{{ $employee->employee_id }}</small>
                                    </div>
                                </div>
                            </td>

                            <td>{{ $employee->company->department ?? 'N/A' }}</td>

                            <td>

                                {{ $employee->age >= 1 ? $employee->age . ' ' . ($employee->age > 1 ? 'ans' : 'an') : '-' }}

                            </td>

                            <td><strong>{{ number_format($employee->salaries->base_salary,2 ?? 'N/A' ) }}</strong></td>

                            <td>{{ $employee->company->hire_date ?? 'N/A'}}</td>

                            <td>{{$employee->company->contract_type}}</td>

                            <td class="text-center">
                                <div class="d-inline-flex gap-1">


                                    <a href="{{ route('employee.view', $employee->id) }}"
                                       class="btn btn-sm btn-outline-primary"
                                       title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>


                                    <a href="{{ route('employee.edit', $employee->id) }}"
                                       class="btn btn-sm btn-outline-warning"
                                       title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>


                                    <button
                                        class="btn btn-sm btn-outline-danger"
                                        title="Disable"
                                        data-bs-toggle="modal"
                                        data-bs-target="#disableEmployeeModal"
                                        data-employee-id="{{ $employee->id }}"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>

    </div>

    @include('Employee.Modal.disable')

@endsection


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {

        // AJAX search
        $('#searchEmployee').on('keyup', function () {
            let search = $(this).val();
            $.ajax({
                url: "{{ route('employee.search') }}",
                type: "GET",
                data: {search: search},
                success: function (data) {
                    $('#employeeTable').html(data);
                }
            });
        });

        // === SUCCESS MESSAGE ===
        @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            iconColor: '#FF6600',
            background: '#fff',
            color: '#333',
            confirmButtonColor: '#FF6600',
            confirmButtonText: 'Ok',
            customClass: {
                popup: 'shadow-lg rounded-2xl',
                title: 'fw-bold fs-5',
                content: 'fs-6'
            },
            timer: 3000,
            timerProgressBar: true,
        });
        @endif

        // === ERROR MESSAGE ===
        @if(session('error'))
        Swal.fire({
            title: 'Error!',
            text: "{{ session('error') }}",
            icon: 'error',
            iconColor: '#FF3300',
            background: '#fff',
            color: '#333',
            confirmButtonColor: '#FF3300',
            confirmButtonText: 'Ok',
            customClass: {
                popup: 'shadow-lg rounded-2xl',
                title: 'fw-bold fs-5',
                content: 'fs-6'
            },
        });
        @endif

        // === VALIDATION ERRORS ===
        @if($errors->any())
        let errorMessages = `
        @foreach ($errors->all() as $error)
        • {{ $error }} <br>
        @endforeach
        `;
        Swal.fire({
            title: 'Validation Errors!',
            html: errorMessages,
            icon: 'error',
            iconColor: '#FF3300',
            background: '#fff',
            color: '#333',
            confirmButtonColor: '#FF3300',
            confirmButtonText: 'Ok',
            customClass: {
                popup: 'shadow-lg rounded-2xl',
                title: 'fw-bold fs-5',
                content: 'fs-6'
            },
        });
        @endif

    });
</script>



