@extends('app.layouts.basicRegister')
@section('content')
    <main class="col-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <body class="bg-body-tertiary">

                <div class="container">
                    <main>
                        <div class="py-5 text-center">
                            <h2>{{ $title }}</h2>
                        </div>
                        <div class="row g-5 px-5 mx-3 py-3">

                            <div class="col-md-7 col-lg-12">
                                <h5 class="mb-3">Informações revelantes sobre a editora</h5>
                                @component('app.publisher._components.formCreateEdit', ['publishers' => $publisher])
                                @endcomponent
                            </div>
                        </div>

                    </main>
                </div>

            </body>

        </div>
    </main>
    <script>
        const publisherForm = document.getElementById('publisherForm');

        publisherForm.addEventListener('submit', function(event) {
            if (!publisherForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                console.log('Formulário enviado!');
            }

            publisherForm.classList.add('was-validated');
        });
    </script>
@endsection
