  <div class="modal fade" id="show-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <form action="" method="POST">
                  @csrf
                  <div class="card">
                      <div class="card-header">
                          <strong>Patain Detail</strong>
                      </div>
                      <div class="card-body">
                          <dl class="row">
                              <dt class="col-sm-5">#</dt>
                              <dd class="col-sm-7">{{ $product->id }}</dd>
                              <dt class="col-sm-5">Name</dt>
                              <dd class="col-sm-7">{{ $product->name }}</dd>
                              <dt class="col-sm-5">Code</dt>
                              <dd class="col-sm-7">{{ $product->code }}</dd>
                              <dt class="col-sm-5">Unit</dt>
                              <dd class="col-sm-7">{{ $product->unit->name }}</dd>
                              <dt class="col-sm-5">Category</dt>
                              <dd class="col-sm-7">{{ $product->category->name }}</dd>
                              <dt class="col-sm-5">Price</dt>
                              <dd class="col-sm-7">$ {{ $product->price }}</dd>
                              <dt class="col-sm-5">Description</dt>
                              <dd class="col-sm-7">{{ $product->description }}</dd>
                          </dl>
                      </div>
                      <div class="card-footer" style="border: 0;">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="position: relative; left: 690px;">Close</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
