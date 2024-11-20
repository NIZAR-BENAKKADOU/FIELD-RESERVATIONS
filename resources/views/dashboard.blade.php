<x-app-layout>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text" id="total-users">Loading...</p>
                            </div>
                            <div class="card-icon">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Welcome!</h3>
                <p class="card-text">merhba blkwariya!!!</p>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/user-count',
                method: 'GET',
                success: function(response) {
                    $('#total-users').text(response.userCount);
                },
                error: function() {
                    $('#total-users').text('Error loading data');
                }
            });
        });
    </script>
    
</x-app-layout>
