 <!-- The Modal Male Product-->
 @foreach ($shoes as $shoe)
     <div class="modal" id="myModalShoes{{ $shoe->id }}" tabindex="-1">
         <div class="modal-dialog modal-xl">
             <div class="modal-content">
                 <div class="wrap">
                     <div class="row">
                         <div class="col-12 col-md-6">
                             <div class="img-product">
                                 <img class="img-modal" src="./images/img-shoes/{{ $shoe->image_path }}" />
                             </div>
                         </div>
                         <div class="col-12 col-md-6">
                             <div class="content-product">
                                 <div class="type-product">
                                     <label for="name" class="fw-bold text-warning h5">Loại sản phẩm:
                                         <span class="text-dark" name="type">giày</span>
                                     </label>
                                 </div>
                                 <div class="title-product">
                                     <label for="name" class="fw-bold text-warning h5">Tên sản phẩm:</label>
                                     <p class="text-center h5">{{ $shoe->name }}</p>
                                 </div>
                                 <div class="price">
                                     <label for="price" class="fw-bold text-warning h5">Giá:</label>
                                     <p class="text-center h5 fw-bold">$ {{ $shoe->price }}</p>
                                 </div>
                                 <div class="comment">
                                     <label for="content" class="fw-bold text-warning h5">Mô tả sẳn phẩm:</label>
                                     <p class="fw-normal text-dark fs-6">{{ $shoe->content }}</p>
                                 </div>

                                 <div class="sl">
                                     <label for="amount" class="text-warning h5 fw-bold">số lượng:</label>
                                     <br>
                                     <input type="number" name="amount" value="1" class="ml-2 p-1" />
                                 </div>
                                 <div class="size-product">
                                     <label for="size" class="text-warning h5 fw-bold">Size:</label>
                                     <br>
                                     <select name="size" id="size" style="width: 30%" class="ml-2 p-2">
                                         <option value="37">37</option>
                                         <option value="38">38</option>
                                         <option value="39">39</option>
                                         <option value="40">40</option>
                                         <option value="41">41</option>
                                         <option value="42">42</option>
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

                 <!-- Modal footer -->
                 <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                 </div>

             </div>
         </div>
     </div>
 @endforeach
 <!-- end modal Male Product-->
