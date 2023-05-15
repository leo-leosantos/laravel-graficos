       {{-- Utilizando o laravelcollective/html": "^5.4.0 --}}

       <div class="form-group">
        <label for="name">Nome do Usuário</label>
        {{ Form::text('name',null, ['placeholder'=>'Nome do Usuário', 'class'=>'form-control']) }}
    </div>
    {{--  <div class="form-group">
        <label for="url">Url</label>

            {{ Form::text('url',null, ['placeholder'=>'Url do produto', 'class'=>'form-control']) }}

    </div>  --}}
    <div class="form-group">
        <label for="email">Email</label>

        {{ Form::email('email',null, ['placeholder'=>'Seu melhor Email', 'class'=>'form-control']) }}

    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        {{ Form::password('password', null, ['placeholder'=>'Senha', 'class'=>'form-control']) }}


    </div>



    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block btn-flat">Cadastrar</button>
    </div>
