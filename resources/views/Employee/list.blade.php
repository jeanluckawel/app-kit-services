@extends('layoutsddd.app')

@section('title', 'Create employee - KIT SERVICES')

@section('content')

    <div class="card mb-4 m-5">

        <!-- Header -->
        <div class="card-header">
            <h3 class="card-title">Employee List</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse"></button>

                <button type="button" class="btn btn-tool" title="Add new employee"
                        style="background:#FF6600; color:#fff; width:40px; height:40px;">
                    <a href="{{ route('employee.create') }}" class="text-decoration-none" style="color: white; font-size: 20px">
                        <i class="bi bi-plus-lg"></i>
                    </a>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body">

            <!-- Barre de recherche -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" id="searchEmployee" class="form-control" placeholder="Search by Employee and full name">
                </div>
            </div>

            <!-- Contenu AJAX : tableau + pagination -->
            <div id="employeeContent">
                @include('Employee.partials.search-result', ['employees' => $employees])
            </div>

        </div>

    </div>

    @include('Employee.Modal.disable')

@endsection

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        // Fonction pour charger les employés (tableau + pagination)
        function fetchEmployees(url = "{{ route('employee.search') }}") {
            let search = $('#searchEmployee').val();
            $.ajax({
                url: url,
                type: 'GET',
                data: { search: search },
                success: function(data) {
                    $('#employeeContent').html(data); // Remplace le tableau + pagination
                },
                error: function() {
                    alert("Erreur lors du chargement des employés.");
                }
            });
        }

        // Recherche AJAX
        $('#searchEmployee').on('keyup', function() {
            fetchEmployees();
        });

        // Pagination AJAX
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            fetchEmployees(url);
            window.history.pushState("", "", url); // met à jour l'URL
        });

        @include('components.alerts')

    });
</script>
