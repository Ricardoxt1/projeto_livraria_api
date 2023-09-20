@if (isset($rentals->id))
    <form method="post" action="{{ route('rental.update', $rentals->id) }}">
        @method('PUT')
        @csrf
    @else
        <form class="needs-validatio" method="post" id="rentalForm" novalidate="" action="{{ route('rental.store') }}">
            @csrf
@endif
<div class="row g-3">
    <div class="col-sm-4">
        <label for="validationCustom01">Selecionar o consumidor</label>
        <select class="form-select" id="validationCustom01" name="customer_id" aria-label="validationServer01Feedback"
            required>
            <option selected="" disabled="">Escolha...</option>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}"
                    {{ $customer->id ?? old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}
                </option>
            @endforeach
        </select>
        <div class="valid-feedback">
            Consumidor(a) selecionado(a)!
        </div>
        <div class="invalid-feedback">
            Necessário selecionar um consumidor.
        </div>
    </div>
    <div class="col-sm-4">
        <label for="validationCustom02">Selecionar o livro</label>
        <select class="form-select" id="validationCustom02" name="book_id" aria-label="validationServer02Feedback"
            required="">
            <option selected="" disabled="" value="">Escolha...</option>
            @foreach ($books as $book)
                <option value="{{ $book->id }}" {{ $book->id ?? old('book_id') == $book->id ? 'selected' : '' }}>
                    {{ $book->titule }}</option>
            @endforeach
        </select>
        <div class="valid-feedback">
            Livro selecionado!
        </div>
        <div class="invalid-feedback">
            Necessário selecionar um livro.
        </div>
    </div>
    <div class="col-sm-4">
        <label for="validationCustom03">Selecionar o vendedor</label>
        <select class="form-select" id="validationCustom03" name="employee_id" aria-label="validationServer03Feedback"
            required>
            <option selected="" disabled="" value="">Escolha...</option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}"
                    {{ $employee->id ?? old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->name }}
                </option>
            @endforeach
        </select>
        <div class="valid-feedback">
            Vendedor(a) selecionado(a)!
        </div>
        <div class="invalid-feedback">
            Necessário selecionar um vendedor.
        </div>
    </div>
    <div class="col-sm-3 my-4">
        <label for="validationCustom04" class="form-label">Data do
            aluguel</label>
        <input type="date" class="form-control" value="{{ $rentals->rental_date ?? old('rental_date') }}" name="rental" id="validationCustom04" placeholder="0000-00-00"
            required>
        <div class="invalid-feedback">
            É necessario digitar a data do aluguel.
        </div>
    </div>
    <div class="col-sm-3 my-4">
        <label for="validationCustom05" class="form-label">Data previsão de
            devolução</label>
        <input type="date" class="form-control" value="{{ $rentals->delivery_date ?? old('delivery_date') }}" name="delivery" id="validationCustom05" placeholder="0000-00-00"
            required>
        <div class="invalid-feedback">
            É necessario digitar a data da previsão de devolução.
        </div>
    </div>
</div>
@if (isset($rentals->id))
    <button class="w-20 my-4 btn btn-success btn-ls" type="submit">Atualizar</button>
@else
    <button class="w-20 my-4 btn btn-primary btn-ls" type="submit">Adicionar</button>
@endif
</form>
