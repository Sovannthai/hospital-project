<div class="modal fade" id="edit-{{ $blog_category->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Category</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('blog-category.update',['blog_category'=>$blog_category->id]) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                      <label for="">Category Name</label>
                      <input type="text" name="name" class="form-control" value="{{ $blog_category->name }}">
                  </div>
                  <div>
                      <span>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal"  style="position: relative;left:305px;">Cancel</button>
                      </span>
                      <button type="submit" class="btn btn-primary" style="position: relative;left:305px;">Update</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
