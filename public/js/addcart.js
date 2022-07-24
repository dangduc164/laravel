function addcart(id) {
    $.ajax({
        url: '',
        type: 'GET',
    }).done((add) => {
        console.log(add)
        $('').empty();
        alert("Đã thêm vào giỏ hàng!")
    })
}