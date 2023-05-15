    @csrf
    <div class="form-group">
        <label for="name">Nome do Produto</label>
        <input type="text" name="name" placeholder="Nome do produto" class="form-control"
            value="{{ $product->name ?? old('name') }}">
    </div>
    <div class="form-group">
        <label for="url">Url</label>
        <input type="text" name="url" placeholder="Url do produto" class="form-control"
            value="{{ $product->url ?? old('url') }}">
    </div>
    <div class="form-group">
        <label for="price">Preço do Produto</label>
        <input type="number" name="price" min="0.00" placeholder="Preço do produto" class="form-control"
            value="{{ $product->price ?? old('price') }}">
    </div>

    <div class="form-group">
        <label for="category_id">Categoria do Produto</label>
        <select name="category_id" id="" class="form-control">
            <option value="">Selecione uma categoria</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                        @if ($category->id == $product->category_id) selected @endif >{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="description">Descrição do Produto</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control">
            {{ $product->description ?? old('description') }}
        </textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block btn-flat">Cadastrar</button>
    </div>
