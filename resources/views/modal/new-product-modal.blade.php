<div class="modal fade" id="newProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h1>Add User to Product</h1>
        <form enctype="multipart/form-data" role="form" method="post" action="{{ route('create-product') }}">
          @csrf
          {{-- dd($errors->all()) --}}
          @if ($errors->has('picture'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->all()[0] }}</strong>
              </span>
          @endif
          <div class="form-group my-0 py-0">
              <label for="name">Name:</label>
              <input value="{{ old('name') }}" placeholder="Title" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required>

              @if ($errors->has('name'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group my-0 py-0">
              <label for="description">Name:</label>
              <textarea placeholder="Description" type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required>{{ old('description') }}</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group my-0 py-0">
              <label for="price">Price:</label>
              <input value="{{ old('price') }}" placeholder="Price" type="number" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" required>

                @if ($errors->has('price'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
          </div>
          <div class="form-group">
              <label for="name">Picture:</label>
              <input type="file" name="picture" class="form-control" required>

          </div><br/>


          <div class="form-group">
                  <button id="add-item-button" class="btn  btn-flat btn-primary btn-lg btn-block">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
