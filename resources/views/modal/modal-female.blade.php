  <!-- The Modal Female Product-->
  @foreach ($females as $female)
      <div class="modal" id="myModal{{ $female->id }}">
          <div class="modal-dialog modal-xl">
              <div class="modal-content">
                  <form action="{{ route('addcart', $female->id) }}" method="post">
                      @csrf
                      <div class="wrap p-4">
                          <div class="row">
                              <div class="col-12 col-md-6">
                                  <div class="img-product">
                                      <img class="img-modal" src="./images/products/{{ $female->image_path }}" />
                                  </div>
                              </div>
                              <div class="col-12 col-md-6">
                                  <div class="content-product">
                                      <div class="type-product" style="display: none">
                                          <label for="name" class="fw-bold text-warning h5">Loại sản phẩm:
                                              <input type="text" class="text-dark bg-white" style="border: none"
                                                  name="type" value="1" />
                                          </label>
                                      </div>
                                      <div class="title-product py-3">
                                          <label for="name" class="fw-bold text-warning h5">Tên sản phẩm:</label>
                                          <p class="text-center h5">{{ $female->name }}</p>
                                      </div>
                                      <div class="price">
                                          <label for="price" class="fw-bold text-warning h5">Giá:</label>
                                          <p class="text-center h5 fw-bold">$ {{ $female->price }}</p>
                                      </div>
                                      <div class="comment">
                                          <label for="content" class="fw-bold text-warning h5">Mô tả sẳn phẩm:</label>
                                          <p class="fw-normal text-dark fs-6">{{ $female->content }}</p>
                                      </div>

                                      <div class="sl py-3">
                                          <label for="amount" class="text-warning h5 fw-bold">số lượng:</label>
                                          <br>
                                          <input type="number" name="amount" value="1" class="ml-2 p-1" />

                                      </div>
                                      <div class="size-product py-3">
                                          <label for="size" class="text-warning h5 fw-bold">Size:</label>
                                          <br>
                                          <select name="size" id="size" style="width: 30%" class="ml-2 p-2">
                                              <option value="xs">xs</option>
                                              <option value="s">s</option>
                                              <option value="m">m</option>
                                              <option value="l">l</option>
                                              <option value="xl">xl</option>
                                              <option value="xxl">xxl</option>
                                          </select>
                                      </div>

                                      <div class="info">
                                          <label for="phone" class="text-warning h5 fw-bold">Số điện thoại:</label>
                                          <br>
                                          <input type="number" name="phone">
                                      </div>
                                      <div class="btn-group pt-3">
                                          <input type="submit" value="Thêm vào giở hàng" class="btn btn-warning">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>

              </div>
          </div>
      </div>
  @endforeach
  <!-- end modal Female Product-->
