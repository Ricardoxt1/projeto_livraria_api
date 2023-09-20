@extends('app.layouts.basicRegister')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <body class="bg-body-tertiary">

                <div class="container">
                    <main>
                        <div class="py-5 text-center">
                            <div>
                                <h2>{{ $title }}</h2>
                            </div>
                        </div>

                        <div class="row g-5 px-5 mx-3 py-5">

                            <div class="col-md-7 col-lg-12">
                                <h5 class="mb-4">Registro sobre o aluguel</h5>
                                @component('app.rental._components.formCreateEdit', [
                                    'rentals' => $rental,
                                    'books' => $books,
                                    'customers' => $customers,
                                    'employees' => $employees,
                                    'employees' => $employees,
                                ])
                                @endcomponent
                            </div>
                        </div>
                    </main>
                </div>
            </body>
        </div>
    </main>
    <script>
        const rentalForm = document.getElementById('rentalForm');

        rentalForm.addEventListener('submit', function(event) {
            if (!rentalForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                console.log('Formulário enviado!');
            }

            rentalForm.classList.add('was-validated');
        });
    </script>
@endsection
