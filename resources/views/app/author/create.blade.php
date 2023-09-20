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
                        <div class="row g-5 px-5 mx-3 py-5">

                            <div class="col-md-7 col-lg-12">
                                <h5 class="mb-3">Informações revelantes sobre o autor</h5>
                                @component('app.author._components.formCreateEdit', ['authors' => $author])
                                @endcomponent
                            </div>
                        </div>
                    </main>
                </div>
        </div>
    </main>

    </body>

    </div>
    </main>
    <script>
        const authorForm = document.getElementById('authorForm');

        authorForm.addEventListener('submit', function(event) {
            if (!authorForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                console.log('Formulário enviado!');
            }

            authorForm.classList.add('was-validated');
        });
    </script>
@endsection
