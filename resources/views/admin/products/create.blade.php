@extends('admin.products.layout')

@section('content')

<style>
  .choices__button {
    background-image: url('https://img.icons8.com/ios/50/000000/delete-sign--v1.png') !important;
   
  }
</style>

@php
    $page_title = "Bioskin | Create product";
@endphp

<div class="content-header"></div>


    <div class="page-header mb-3 mt-2">
      <h3 class="mt-2" id="page-title">Create Product</h3>
      <hr>
      <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm"><span class='fas fa-arrow-left'></span></a>
  </div>

      @if(count($errors)>0)
      <div class="row">
          <div class="col-sm-12 col-md-12">
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
          
                      <li>{{$error}}</li>
                          
                      @endforeach
                  </ul>
              </div>
          </div>
      </div>
      @endif
  
      @if(\Session::has('success'))
      <div class="col-sm-12 col-md-12">
          <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> </h5>
          {{ \Session::get('success') }}
        </div>
      </div>
     
      @endif


      <div class="row">

        <div class="col-sm-12 col-md-12">
          <div class="card">
              <div class="card-body">
                  <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                      @csrf
                      <div class="row">

                        <div class="col-sm-12 col-md-6 mt-2">
                          <label class="col-form-label">Category</label>
                            <select class="form-control" name="category_id">
                              @foreach ($categories as $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 mt-2">
                          <label class="col-form-label">Sub Category</label>
                            <select class="form-control" name="sub_category_id">
                            </select>
                        </div>
                          <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label">SKU</label>
                            <input type="text" class="form-control" name="sku" required>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label">Product name</label>
                            <input type="text" class="form-control" name="name" required>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label">Features</label>
                            <textarea type="text" class="form-control" name="features" rows="4"></textarea>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label">Description</label>
                            <textarea type="text" class="form-control" name="description" rows="4"></textarea>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label">Ingredients</label>
                            <textarea type="text" class="form-control" name="ingredients" rows="4"></textarea>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label">Variation</label>
                              <select class="form-control" name="variation_id">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-sm-2">
                            <label class="col-form-label" for="choices-multiple-remove-button">Size</label>
                              <select class="form-control" name="size_id">
                                <option value="90g" selected>90g</option>
                                <option value="90g">135g</option>
                                <option value="30ml">30ml</option>
                              </select>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-sm-2">
                            <label class="col-form-label">Price</label>
                            <input type="number" step="any" class="form-control" name="price" required>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-2 packaging">
                            <label class="col-form-label" for="choices-multiple-remove-button">Packaging</label>
                              <select class="form-control" name="packaging_id">
                                <option value="90g" selected>Round Bottle Clear</option>
                                <option value="90g">Glass Bottle Green</option>
                                <option value="30ml">Cream Jar</option>
                              </select>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-sm-2 packaging">
                            <label class="col-form-label" for="choices-multiple-remove-button">Closure</label>
                              <select class="form-control" name="cap_id">
                                <option value="Fliptop Cap White 60ml" selected>Fliptop Cap White 60ml</option>
                                <option value="Fliptop Cap Black 100ml">Fliptop Cap Black 100ml</option>
                                <option value="Own Packaging">Own Packaging</option>
                              </select>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label" for="choices-multiple-remove-button">Volumes</label>
                              <select class="form-control choices-multiple" name="volumes[]" placeholder="Add multiple volumes"
                                multiple>
                                <option value="100" selected>100 pieces</option>
                                <option value="200">200 pieces</option>
                                <option value="300">300 pieces</option>
                                <option value="400">400 pieces</option>
                              </select>
                          </div>

                          <div class="col-sm-12 mt-3">
                              
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="rebranding" id="rebranding" value="1">
                            <label class="form-check-label" for="exampleCheck1">Rebranding</label>
                          </div>
                          </div>

                       <!--   <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label" for="choices-multiple-remove-button">Variations</label>
                              <select class="form-control choices-multiple" name="variations[]" placeholder="Add more variation"
                                multiple>
                                <option value="Dropdown item 1" selected>Dropdown item 1</option>
                                <option value="Dropdown item 2">Dropdown item 2</option>
                                <option value="Dropdown item 3">Dropdown item 3</option>
                                <option value="Dropdown item 4">Dropdown item 4</option>
                              </select>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label" for="choices-multiple-remove-button">Sizes</label>
                              <select class="form-control choices-multiple" name="sizes[]" placeholder="Add more sizes"
                                multiple>
                                <option value="90g" selected>90g</option>
                                <option value="90g">135g</option>
                                <option value="30ml">30ml</option>
                              </select>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label" for="choices-multiple-remove-button">Packaging</label>
                              <select class="form-control choices-multiple" name="packaging[]" placeholder="Add more packaging"
                                multiple>
                                <option value="90g" selected>90g</option>
                                <option value="90g">135g</option>
                                <option value="30ml">30ml</option>
                              </select>
                          </div>

                          <div class="col-sm-12 col-md-6 mt-2">
                            <label class="col-form-label" for="choices-multiple-remove-button">Caps</label>
                              <select class="form-control choices-multiple" name="caps[]" placeholder="Add more caps"
                                multiple>
                                <option value="90g" selected>90g</option>
                                <option value="90g">135g</option>
                                <option value="30ml">30ml</option>
                              </select>
                          </div>
                        -->

                          <div class="col-sm-12 col-md-12 mt-2">
                            <label class="col-form-label" for="choices-multiple-remove-button">Images</label>
                            <input required type="file" class="form-control-file" name="images[]" placeholder="address" multiple accept=".jpg,.jpeg,.png">
                          </div>
                          


  
                            <div class="col-12 mt-4">
                              <button type="submit" class="btn btn-sm btn-primary mr-2" id="btn-add-user">Save</button>
                              <a href="{{ route('product.index') }}" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</a>
                            </div>
                            
              
                      </div>
                  </form>
              </div>
          </div>
      </div>
    

        
      </div>
    </section>
    
@endsection