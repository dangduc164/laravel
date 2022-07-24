  <!-- The Modal Female Product-->
  @foreach ($females as $female)
      <div class="modal" id="myModal{{ $female->id }}">
          <div class="modal-dialog modal-xl">
              <div class="modal-content">
                  <div class="wrap">
                      <div class="row">
                          <div class="col">
                              <div class="img-product">
                                  <img class="img-modal" src="./images/img-female/{{ $female->image_path }}" />
                              </div>
                          </div>
                          <div class="col">
                              <div class="content-product">
                                  <div class="title-product">
                                      <label for="name" class="text-warning h3">Tên sản phẩm:</label>
                                      <p class="text-center h4">{{ $female->name }}</p>
                                  </div>
                                  <div class="price pt-4">
                                      <label for="[rice" class="text-warning h3">Giá:</label>
                                      <p class="text-center h4">$ {{ $female->price }}</p>
                                  </div>
                                  <div class="comment">
                                      <label for="comment" class="text-warning h3">Mô tả sản phẩm:</label>
                                      <p class="fw-normal">{{ $female->content }}</p>
                                  </div>

                                  <div class="sl">
                                      <label for="number" class="text-warning h3">Số lượng:</label>
                                      <input type="number" value="1" />

                                  </div>
                                  <div class="size-product pt-3">
                                      <label class="text-warning h3">Size:</label>
                                      <select name="size" id="size" style="width: 30%">
                                          <option value="xs">xs</option>
                                          <option value="s">s</option>
                                          <option value="m">m</option>
                                          <option value="l">l</option>
                                          <option value="xl">xl</option>
                                          <option value="xxl">xxl</option>
                                      </select>
                                  </div>
                                  <div class="btn-group pt-3">
                                      <form action="{{ url('addcart', $female->id) }}" method="POST">
                                          @csrf
                                          <input type="submit" value="Thêm sản phẩm vào giỏ hàng"
                                              class="btn btn-warning">
                                      </form>
                                      {{-- <a onclick="addCart()" class="btn btn-warning">Thêm vào giỏ
                                          hàng
                                      </a> --}}
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>

              </div>
          </div>
      </div>
  @endforeach
  <!-- end modal Female Product-->
