<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/vendor/js/template-customizer.js')}}"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js')}}"></script>
    <style>
        @media (max-width: 768px) {
            #sidebar {
                width: 150px;
            }
        }
        .sidebar {
            width: 200px;
            margin: 0 10px;
            padding: 10px;
        }
        .dev {
            margin-right: -98%;
            margin-left: -0.02%;
        }
        .prod {
            margin-right: -100%;
            width: 100%;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .button-heading-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .input-group .form-control {
            border-radius: 0.375rem;
        }
    </style>
</head>
<body class="bg-white">
    @include('admin.sidebar')
    <div class="layout-page">
        @include('admin.nav')
        <div class="button-heading-container">
        <h4 class="py-3 mb-2 ms-4">Tous les Commandes</h4>
        <div class="d-flex justify-content-between align-items-center">
    <a href="/ordre" class="butt bg-red-700 hover:bg-black-700 text-white py-2 px-4 rounded" style="margin-right: 25px;">
        Nouvelle Commande
    </a>
</div>



        </div>
        
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header">
                    <div class="input-group">
                        <input type="text" id="search-input" class="form-control" placeholder="Rechercher...">
                        <span class="input-group-text"><i class="ti ti-search"></i></span>
                    </div>
                </div>
                <div class="card-datatable table-responsive table">
                    <table class="table datatables-customers table border-top" id="orders-table">
                        <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Branche</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>Source</th>
                                <th>Total</th>
                                <th>Date d'affaires</th>
                                <th>Ouvert à</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach ($cmds as $command)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->branch }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->client }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->status }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->source }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->total_price }}dt</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->created_at }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">8h</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const table = document.getElementById('orders-table');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.getElementsByTagName('tr'));

        searchInput.addEventListener('keyup', function() {
            const query = searchInput.value.toLowerCase();

            rows.forEach(function(row) {
                const statusCell = row.getElementsByTagName('td')[3];
                const clientCell = row.getElementsByTagName('td')[2];
                const statusText = statusCell ? statusCell.textContent.toLowerCase() : '';
                const clientText = clientCell ? clientCell.textContent.toLowerCase() : '';

                if (statusText.includes(query) || clientText.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

</body>
</html>
