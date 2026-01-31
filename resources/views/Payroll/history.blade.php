@extends('layoutsddd.app')

@section('title', 'Payroll History - KIT SERVICES')

@section('content')

    <div class="card mb-4 m-5">

        <!-- Header -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Payroll List</h3>
            <p class="mb-0">
                Payroll Period:
{{--                <strong>{{ \Carbon\Carbon::parse($start_date)->format('d/m/Y') }} → {{ \Carbon\Carbon::parse($end_date)->format('d/m/Y') }}</strong>--}}
            <p class="mb-2">Du {{ payrollPeriod()['start'] }} au {{ payrollPeriod()['end'] }}</p>

        </div>

        <!-- Body -->
        <div class="card-body">

            <!-- Barre de recherche -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" id="searchPayroll" class="form-control" placeholder="Search by Employee number or name">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-nowrap" id="payrollTable">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Age</th>
                        <th>Salary (USD)</th>
                        <th>Hire Date</th>
                        <th>Contract</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payrolls as $payroll)
{{--                        @php--}}
{{--                            $employee = $employee->$employee_id;--}}
{{--                            $initials = strtoupper(substr($employee->first_name,0,1) . substr($employee->last_name,0,1));--}}
{{--                            $bgColor = '#ff7f00';--}}
{{--                        @endphp--}}
                        <tr>
{{--                            <td>{{ $loop->iteration + ($payrolls->currentPage()-1) * $payrolls->perPage() }}</td>--}}
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    @if($employee->photo)
                                        <img src="{{ asset('storage/'.$employee->photo) }}" alt="Photo" class="rounded-circle" width="45" height="45">
                                    @else
                                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                                             style="width:45px; height:45px; background-color: {{ $bgColor }}; color:white; font-weight:bold; font-size:16px;">
                                            {{ $initials }}
                                        </div>
                                    @endif
                                    <div>
                                        <strong>{{ $employee->first_name }} {{ $employee->last_name }}</strong><br>
                                        <small>{{ $employee->employee_id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $employee->company->department ?? 'N/A' }}</td>
                            <td>{{ $employee->age ?? '-' }}</td>
                            <td>{{ number_format($payroll->basic_usd ?? 0, 2) }}</td>
                            <td>{{ $employee->company->hire_date ?? 'N/A' }}</td>
                            <td>
                                @php
                                    $type = $employee->company->contract_type ?? '';
                                    $endDate = $employee->company->end_contract_date ?? null;
                                @endphp
                                @if(strtoupper($type) === 'CDD')
                                    <span class="badge" style="background-color: #ff7f00; color:white;">
                                    {{ $type }}
                                        @if($endDate)
                                            ({{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }})
                                        @endif
                                </span>
                                @elseif(strtoupper($type) === 'CDI')
                                    <span class="badge" style="background-color: #dc3545; color:white;">{{ $type }}</span>
                                @else
                                    <span>{{ $type }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('employee.view', $employee->id) }}" class="btn btn-sm btn-outline-primary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('payroll.create', $employee->id) }}" class="btn btn-sm btn-outline-success" title="Payroll">
                                        <i class="bi bi-cash-stack"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                        @if($payrolls->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $payrolls->previousPageUrl() }}">&laquo;</a></li>
                        @endif

                        @foreach($payrolls->getUrlRange(1, $payrolls->lastPage()) as $page => $url)
                            <li class="page-item {{ $payrolls->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if($payrolls->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $payrolls->nextPageUrl() }}">&raquo;</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                </div>

            </div>
        </div>

    </div>

    <!-- Search JS -->
    <script>
        document.getElementById('searchPayroll').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            document.querySelectorAll('#payrollTable tbody tr').forEach(function(row) {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

@endsection
