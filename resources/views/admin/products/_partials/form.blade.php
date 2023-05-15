       {{-- Utilizando o laravelcollective/html": "^5.4.0 --}}

   <div class="form-group">
        <label for="name">Nome do Produto</label>
        {{ Form::text('name',null, ['placeholder'=>'Nome do Produto', 'class'=>'form-control']) }}
    </div>
    {{--  <div class="form-group">
        <label for="url">Url</label>

            {{ Form::text('url',null, ['placeholder'=>'Url do produto', 'class'=>'form-control']) }}

    </div>  --}}
    <div class="form-group">
        <label for="price">Preço do Produto</label>

        {{ Form::number('price',null, ['placeholder'=>'Preço do produto', 'class'=>'form-control']) }}

    </div>

    <div class="form-group">
        <label for="category_id">Categoria do Produto</label>

            {{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        <label for="description">Descrição do Produto</label>
        {{ Form::textarea('description',null, ['placeholder'=>'Descrição  do produto', 'class'=>'form-control']) }}

    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block btn-flat">Cadastrar</button>
    </div>
