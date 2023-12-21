<!-- Modal -->
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Cerate Product</h5>
              </div>
              <div class="modal-body">
                  <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Code</label>
                            <input type="text" name="code" class="form-control">
                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="">Unit</label>
                            <select name="unit_id" id="" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="">Category</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="">Price</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="form-group col-4">
                            <label for="file">File</label>
                            <input type="file" name="image" class="form-control" id="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" rows="5" class="form-control"></textarea>
                    </div>
                    <div class=" form-group">
                        <label for="active">Active:</label>
                        <input type="checkbox" name="status" value="Active">
                    </div>
                    <div>
                        <span>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  style="position: relative;left:635px;">Close</button>
                        </span>
                        <button type="submit" class="btn btn-primary" style="position: relative;left:635px;">Save</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
