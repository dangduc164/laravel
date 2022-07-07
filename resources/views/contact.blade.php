<!DOCTYPE html>
<html lang="en">

@include('head')

<body>
    {{-- header --}}
   @include('header')
   {{-- end header --}}
    {{-- main --}}
    <main>
      
      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title py-5 text-danger h2"><b>LIÊN HỆ</b></h1>
                    <div class="gg-map text-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3727.0365942906506!2d105.72607329200353!3d20.910847341622606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31344daf38660bc7%3A0x74523fa6be6cebd2!2zWMaw4bufbmcgbeG7mWMgxJDEg25nIFh1ecOqbg!5e0!3m2!1svi!2s!4v1653017757305!5m2!1svi!2s"
                            width="100%" height="550" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="text-dark h5 py-5 border-danger">
                   <div class="container">
                        <div class="row">
                            <div class="col-12">
                                Hãy để lại thông tin của bạn chúng tôi sẽ liện lạc với bạn sớm nhất. <br> Rất vui khi được phục vụ các bạn. <br> Xin cảm ơn!</div>
                            </div>
                        </div>
                   </div>
                </div>
               <div class="row">
                    <div class="col-7">
                        <div class="alert alert-success p-5" style="border-radius: 50px" role="alert">
                            @if(session('success')){{ session('success') }}
                            @endif
                        </div>
                    </div>
               </div >
                <div class="col-md-12">
                    <form action="{{route('contactUIsubmit')}}" class="default-form"  method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Name</label>
                                     <input type="text" class="form-control" name="name" id="name" placeholder="Đức"/>
                                </div>
                                <div class="col-6">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nguyễn Đăng" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="email">Email <span class="require">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="abc@gmail.com"/>
        
                                </div>
                                <div class="col-6">
                                    <label for="phone">Phone <span class="require">*</span></label>
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="09876173"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <input type="text" class="form-control p-5" rows="8" id="comment" name="comment" placeholder="Xin chào !"></input>
                        </div>
                        <div class="py-5 text-center">
                            <button type="submit" class="btn btn-primary" onclick="check()">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
    {{-- end main --}}
    @include('footer')
    {{-- link js --}}
   @include('linkjs')
   {{-- end link js --}}
   
  </body>
</html>