{{--<div class="sidebar-wrapper">--}}
{{--    <nav class="mt-2">--}}
{{--        <!-- Sidebar Menu -->--}}
{{--        <ul--}}
{{--            class="nav sidebar-menu flex-column"--}}
{{--            data-lte-toggle="treeview"--}}
{{--            role="navigation"--}}
{{--            aria-label="Main navigation"--}}
{{--            data-accordion="false"--}}
{{--            id="navigation"--}}
{{--        >--}}
{{--            <!-- Dashboard -->--}}
{{--            @can('view-dashboard')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('dashboard') }}" class="nav-link">--}}
{{--                        <i class="nav-icon bi bi-speedometer"></i>--}}
{{--                        <p>Dashboard</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            <!-- Employees Section -->--}}
{{--            @if(auth()->check() && (--}}
{{--                auth()->user()->can('create_employee') ||--}}
{{--                auth()->user()->can('view_employee') ||--}}
{{--                auth()->user()->can('import_employee') ||--}}
{{--                auth()->user()->can('export_employee')--}}
{{--            ))--}}
{{--                <li class="nav-header">EMPLOYEES</li>--}}
{{--                @can('create_employee')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('employee.create') }}" class="nav-link">--}}
{{--                        <i class="nav-icon bi bi-person-plus-fill"></i>--}}
{{--                        <p>Add</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                @endcan--}}

{{--                @can('view_employee')--}}

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('employee.list') }}" class="nav-link">--}}
{{--                        <i class="nav-icon bi bi-people-fill"></i>--}}
{{--                        <p>List</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                @endcan--}}

{{--                @can('import_employee')--}}

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('employee.import.show') }}" class="nav-link">--}}
{{--                        <i class="nav-icon bi bi-file-arrow-up"></i>--}}
{{--                        <p>Import</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                @endcan--}}

{{--                @can('export_employee')--}}

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('employee.export.show') }}" class="nav-link">--}}
{{--                        <i class="nav-icon bi bi-file-arrow-down"></i>--}}
{{--                        <p>Export</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('employee.cdd') }}" class="nav-link">--}}
{{--                            <i class="nav-icon bi bi-file-earmark-text"></i>--}}
{{--                            <p>CDD</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('employee.cdi') }}" class="nav-link">--}}
{{--                            <i class="nav-icon bi bi-file-earmark-check"></i>--}}
{{--                            <p>CDI</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                @endcan--}}

{{--            @endif--}}



{{--            <!-- Invoices Section -->--}}

{{--                <li class="nav-header">INVOICES</li>--}}

{{--                @can('view_customer')--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('customer.index') }}" class="nav-link">--}}
{{--                            <i class="nav-icon bi bi-receipt"></i>--}}
{{--                            <p>All Customers</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}





{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon bi bi-plus-square"></i>--}}
{{--                        <p>All Statement</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                @can('create_customer')--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('customer.create') }}" class="nav-link">--}}
{{--                            <i class="nav-icon bi bi-person-plus"></i>--}}
{{--                            <p>Create Customer</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                @endcan--}}

{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon bi bi-file-plus"></i>--}}
{{--                        <p>Create Invoice</p>--}}
{{--                    </a>--}}
{{--                </li>--}}






{{--            <li class="nav-header">CONFIGURATION</li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('users.index') }}" class="nav-link">--}}
{{--                    <i class="nav-icon bi bi-people"></i>--}}
{{--                    <p>All Users</p>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('users.create') }}" class="nav-link">--}}
{{--                    <i class="nav-icon bi bi-person-plus"></i>--}}
{{--                    <p>Create User</p>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('roles.index') }}" class="nav-link">--}}
{{--                    <i class="nav-icon bi bi-shield-lock"></i>--}}
{{--                    <p>All Roles</p>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('roles.create') }}" class="nav-link">--}}
{{--                    <i class="nav-icon bi bi-file-plus"></i>--}}
{{--                    <p>Create Role</p>--}}
{{--                </a>--}}
{{--            </li>--}}



{{--        </ul>--}}
{{--    </nav>--}}
{{--</div>--}}

<div class="sidebar-wrapper">
    <nav class="mt-2">
        <ul class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="navigation"
            aria-label="Main navigation"
            data-accordion="false"
            id="navigation">

            {{-- Dashboard --}}
{{--            @can('view-dashboard')--}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
{{--            @endcan--}}

            {{-- Employees --}}
            @if(auth()->check() && (
                auth()->user()->can('create_employee') ||
                auth()->user()->can('view_employee') ||
                auth()->user()->can('import_employee') ||
                auth()->user()->can('export_employee')
            ))

                <li class="nav-header">{{ __('Employees') }}</li>

                @can('create_employee')
                    <li class="nav-item">
                        <a href="{{ route('employee.create') }}" class="nav-link">
                            <i class="nav-icon bi bi-person-plus-fill"></i>
                            <p>{{ __('Add Employee') }}</p>
                        </a>
                    </li>
                @endcan

                @can('view_employee')
                    <li class="nav-item">
                        <a href="{{ route('employee.list') }}" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>{{ __('Employee List') }}</p>
                        </a>
                    </li>
                @endcan

                @can('import_employee')
                    <li class="nav-item">
                        <a href="{{ route('employee.import.show') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-arrow-up"></i>
                            <p>{{ __('Import Employees') }}</p>
                        </a>
                    </li>
                @endcan

                @can('export_employee')
                    <li class="nav-item">
                        <a href="{{ route('employee.export.show') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-arrow-down"></i>
                            <p>{{ __('Export Employees') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('employee.cdd') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-text"></i>
                            <p>{{ __('CDD Contracts') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('employee.cdi') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-check"></i>
                            <p>{{ __('CDI Contracts') }}</p>
                        </a>
                    </li>
                @endcan
            @endif

            {{-- Invoices --}}
            <li class="nav-header">{{ __('Invoices') }}</li>

            @can('view_customer')
                <li class="nav-item">
                    <a href="{{ route('customer.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-receipt"></i>
                        <p>{{ __('All Customers') }}</p>
                    </a>
                </li>
            @endcan

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-plus-square"></i>
                    <p>{{ __('All Statements') }}</p>
                </a>
            </li>

            @can('create_customer')
                <li class="nav-item">
                    <a href="{{ route('customer.create') }}" class="nav-link">
                        <i class="nav-icon bi bi-person-plus"></i>
                        <p>{{ __('Create Customer') }}</p>
                    </a>
                </li>
            @endcan

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-file-plus"></i>
                    <p>{{ __('Create Invoice') }}</p>
                </a>
            </li>

            <li class="nav-header">{{ __('Payrolls') }}</li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-currency-dollar"></i>
                    <p>
                        {{ __('Payroll') }}
                        <i class="right bi bi-chevron-down"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ms-3">
                    <li class="nav-item">
                        <a href="{{ route('payroll.index') }}" class="nav-link">
                            <i class="bi bi-plus-circle nav-icon"></i>
                            <p>{{ __('Create') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('payroll.history') }}" class="nav-link">
                            <i class="bi bi-clock-history nav-icon"></i>
                            <p>{{ __('History') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-file-earmark-text nav-icon"></i>
                            <p>{{ __('Rapport') }}</p>
                        </a>
                    </li>
                </ul>
            </li>


            {{-- Configuration --}}
            <li class="nav-header">{{ __('Configuration') }}</li>




            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-people"></i>
                    <p>{{ __('All Users') }}</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link">
                    <i class="nav-icon bi bi-person-plus"></i>
                    <p>{{ __('Create User') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-shield-lock"></i>
                    <p>{{ __('All Roles') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('roles.create') }}" class="nav-link">
                    <i class="nav-icon bi bi-file-plus"></i>
                    <p>{{ __('Create Role') }}</p>
                </a>
            </li>

        </ul>
    </nav>
</div>

