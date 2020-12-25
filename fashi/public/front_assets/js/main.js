/*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
	proQty.prepend('<span class="dec qtybtn">-</span>');
	proQty.append('<span class="inc qtybtn">+</span>');
	proQty.on('click', '.qtybtn', function () {
        var stock = $('#showStock').val();console.log('stock' + stock);
		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 1;
			}
        }

        if(newVal > stock && $('#showStock').text() != 'Size')
        {
            $('#addToCart').text("KHÔNG ĐỦ HÀNG");
            $('#addToCart').prop('disabled', true);
        }
        else{
            $('#addToCart').text("THÊM VÀO GIỎ HÀNG");
            $('#addToCart').prop('disabled', false);
        }

		$button.parent().find('input').val(newVal);
	});
