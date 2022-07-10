 <!-- The Modal Male Product-->
 @foreach ($shoes as $shoe)
     <div class="modal" id="myModalShoes{{ $shoe->id }}" tabindex="-1">
         <div class="modal-dialog modal-xl modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header"></div>
                 <div class="wrap">
                     <div class="row">
                         <div class="col">
                             <div class="img-product">
                                 <img class="img-modal" src="./images/img-shoes/{{ $shoe->image_path }}" />
                             </div>
                         </div>
                         <div class="col">
                             <div class="content-product">
                                 <div class="title-product">
                                     <h2>{{ $shoe->name }}</h2>
                                 </div>
                                 <div class="price">
                                     <h4>{{ $shoe->price }}</h4>
                                 </div>
                                 <div class="comment">
                                     <p>{{ $shoe->content }}</p>
                                 </div>

                                 <div class="sl">
                                     <label for="">số lượng</label>
                                     <input type="number" value="1" />

                                 </div>
                                 <div class="size-product">
                                     <label>Size</label>
                                     <select name="size" id="size" style="width: 90%">
                                         <option value="xs">xs</option>
                                         <option value="s">s</option>
                                         <option value="m">m</option>
                                         <option value="l">l</option>
                                         <option value="xl">xl</option>
                                         <option value="xxl">xxl</option>
                                     </select>
                                 </div>
                                 <div class="btn-group pt-3">
                                     <a href="" class="btn btn-warning">Thêm vào giỏ
                                         hàng</a>
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
