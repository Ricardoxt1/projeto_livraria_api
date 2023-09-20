@if (isset($publishers->id))
    <form class="row g-3 needs-validation my-3" method="post" id="publisherForm" novalidate=""
        action="{{ route('publisher.update', $publishers->id) }}">
        @method('PUT')
        @csrf
    @else
        <form class="row g-3 needs-validation my-3" method="post" id="publisherForm" novalidate=""
            action="{{ route('publisher.store') }}">
            @csrf
@endif
<div class="col-md-4">
    <label for="validationCustom01" class="form-label">Nome da editora</label>
    <input type="text" class="form-control" id="validationCustom01" value="{{ $publishers->name ?? old('name') }}"
        name="name" placeholder="digite nome da editora" required="">
    <div class="valid-feedback">
        Nome da editora preenchido!
    </div>
    <div class="invalid-feedback">
        É necessario digitar o nome da editora.
    </div>
</div>

@if (isset($publishers->id))
    <div class="col-12">
        <button class="btn btn-success mt-5" type="submit">Atualizar</button>
    </div>
@else
    <div class="col-12">
        <button class="btn btn-primary mt-5" type="submit">Adicionar</button>
    </div>
@endif
</form>
