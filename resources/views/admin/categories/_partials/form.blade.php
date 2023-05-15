@csrf
<div class="form-group">
    <label for="title">Titulo da Categoria</label>
    <input type="text" name="title" class="form-control" placeholder="Titulo da Categoria" value="{{ $category->title ?? old('title') }}">
</div>
{{--  <div class="form-group">
    <label for="title">url da cateoria</label>
    <input type="text" name="url" class="form-control" placeholder="URL da Categoria" value="{{ $category->url ?? old('url') }}">
</div>  --}}

<div class="form-group">
    <label for="title">Descrição da Categoria</label>
    <textarea name="description" class="form-control" placeholder="Descrição da categoria" cols="30" rows="10">
            {{ $category->description ?? old('description') }}
        </textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success btn-block btn-flat">Cadastrar</button>
</div>
