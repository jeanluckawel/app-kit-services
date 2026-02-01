<div class="sidebar-wrapper">
    <nav class="mt-2">
        <ul class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="navigation"
            aria-label="Main navigation"
            data-accordion="false"
            id="navigation">


            @can('dashboard')
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            @endcan



            @canany([
                'employee_create',
                'employee_list',
                'employee_import',
                'employee_export',
                'employee_cdd',
                'employee_cdi'
            ])
                <li class="nav-header">Employees</li>

                @can('employee_create')
                    <li class="nav-item">
                        <a href="{{ route('employee.create') }}" class="nav-link">
                            <i class="nav-icon bi bi-person-plus-fill"></i>
                            <p>Add Employee</p>
                        </a>
                    </li>
                @endcan

                @can('employee_list')
                    <li class="nav-item">
                        <a href="{{ route('employee.list') }}" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>Employee List</p>
                        </a>
                    </li>
                @endcan

                @can('employee_import')
                    <li class="nav-item">
                        <a href="{{ route('employee.import.show') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-arrow-up"></i>
                            <p>Import Employees</p>
                        </a>
                    </li>
                @endcan

                @can('employee_export')
                    <li class="nav-item">
                        <a href="{{ route('employee.export.show') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-arrow-down"></i>
                            <p>Export Employees</p>
                        </a>
                    </li>
                @endcan

                @can('employee_cdd')
                    <li class="nav-item">
                        <a href="{{ route('employee.cdd') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-text"></i>
                            <p>CDD Contracts</p>
                        </a>
                    </li>
                @endcan

                @can('employee_cdi')
                    <li class="nav-item">
                        <a href="{{ route('employee.cdi') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-check"></i>
                            <p>CDI Contracts</p>
                        </a>
                    </li>
                @endcan
            @endcanany



            @canany(['customer_list','invoice_statement','customer_create'])
                <li class="nav-header">Invoices</li>

                @can('customer_list')
                    <li class="nav-item">
                        <a href="{{ route('customer.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-receipt"></i>
                            <p>All Customers</p>
                        </a>
                    </li>
                @endcan

                @can('invoice_statement')
                    <li class="nav-item">
                        <a href="{{ route('invoice.statement') }}" class="nav-link">
                            <i class="nav-icon bi bi-plus-square"></i>
                            <p>All Statements</p>
                        </a>
                    </li>
                @endcan

                @can('customer_create')
                    <li class="nav-item">
                        <a href="{{ route('customer.create') }}" class="nav-link">
                            <i class="nav-icon bi bi-person-plus"></i>
                            <p>Create Customer</p>
                        </a>
                    </li>
                @endcan
            @endcanany



            @canany(['payroll_list','payroll_history','payroll_export_view'])
                <li class="nav-header">Payrolls</li>

                @can('payroll_list')
                    <li class="nav-item">
                        <a href="{{ route('payroll.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-plus-circle"></i>
                            <p>Create</p>
                        </a>
                    </li>
                @endcan

                @can('payroll_history')
                    <li class="nav-item">
                        <a href="{{ route('payroll.history') }}" class="nav-link">
                            <i class="nav-icon bi bi-clock-history"></i>
                            <p>History</p>
                        </a>
                    </li>
                @endcan

                @can('payroll_export_view')
                    <li class="nav-item">
                        <a href="{{ route('payroll.exportView') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-text"></i>
                            <p>Report</p>
                        </a>
                    </li>
                @endcan
            @endcanany


            {{-- ================= CONFIGURATION ================= --}}
            @canany(['user_list','user_create','role_list','role_create'])
                <li class="nav-header">Configuration</li>

                @can('user_list')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-people"></i>
                            <p>All Users</p>
                        </a>
                    </li>
                @endcan

                @can('user_create')
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link">
                            <i class="nav-icon bi bi-person-plus"></i>
                            <p>Create User</p>
                        </a>
                    </li>
                @endcan

                @can('role_list')
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-shield-lock"></i>
                            <p>All Roles</p>
                        </a>
                    </li>
                @endcan

                @can('role_create')
                    <li class="nav-item">
                        <a href="{{ route('roles.create') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-plus"></i>
                            <p>Create Role</p>
                        </a>
                    </li>
                    <br>
                    <br><br>
                @endcan
            @endcanany

        </ul>
    </nav>
</div>
