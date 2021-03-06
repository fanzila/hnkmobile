<? require_once 'Mobile-Detect/Mobile_Detect.php';
$detect = new Mobile_Detect;
$m=false;
if ( $detect->isMobile() ) $m = true;
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>HANK | Menu</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="msapplication-tap-highlight" content="no" />
	<link rel="stylesheet" href="themes/hank.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" type="text/css" href="inc/jquery.mobile.structure-1.4.5.min.css" /> 
	<link rel="stylesheet" href="inc/pickadate/lib/themes/default.css" id="theme_base">
	<link rel="stylesheet" href="inc/pickadate/lib/themes/default.date.css" id="theme_date">
	<link rel="stylesheet" href="inc/pickadate/lib/themes/default.time.css" id="theme_time">
	<link rel="stylesheet" type="text/css" href="inc/hnk.css" />
	<? if(!$m) { ?>
		<style>
		body {
			font-size: 100%;
			background: url(inc/bkg.jpg) no-repeat center fixed;
			-webkit-background-size: cover; /* pour anciens Chrome et Safari */
			background-size: cover; /* version standardisée */
			-moz-transform: scale(0.9, 0.9); /* Moz-browsers */
			zoom: 0.9; /* Other non-webkit browsers */
			zoom: 90%; /* Webkit browsers */	
		}
		
		#Home, #menu, #cart, #pickup
		{
			position: relative;
			width: 500px;
			margin-top: 5px;
		  	margin-left: auto;
		  	margin-right: auto;
		  	box-shadow: 1px 1px 12px #555;
		}

		#logo {
			margin: auto;
		    width: 350px;

		}

		#logo img {
			width: 350px;
			height: 350px;
			margin-top: 8px;
			margin-bottom: 8px;

		}
		</style>
	<? } ?>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
	<? if(!$m) { ?><div id="logo"><img src="inc/logoblanc.png"></div><? } ?>
	<div data-role="page" id="menu" data-theme="a">
		<div data-role="header" data-theme="a">
			<div data-role="header">
				<a href="index.php" rel="external" data-transition="none" id="bt-back" data-icon="carat-l">Back</a>
				<h1 id="main_title">Menu</h1>
				<a href="#cart" rel="external" data-transition="none" data-icon="shop"><!-- <span class="simpleCart_quantity"></span> items | --><span class="simpleCart_grandTotal"></span></a>
			</div>
			
			<div id="navbar" data-role="navbar">
				<ul>
					<li><a id="bt-menus" data-icon="carat-d" onclick="show('menu_choose',0);" href="#menu">Menus</a></li>
					<li><a id="bt-burgers" data-icon="carat-d" onclick="show(1,0);" href="#menu">Burgers</a></li>
					<li><a id="bt-sides" data-icon="carat-d" onclick="show(2,0);" href="#menu">Sides</a></li>
					<li><a id="bt-drinks" data-icon="carat-d" onclick="show(3,0);" href="#menu">Drinks</a></li>
					<li><a id="bt-desserts" data-icon="carat-d" onclick="show(4,0);" href="#menu">Desserts</a></li>
				</ul>
			</div><!-- /navbar -->
		</div><!-- /header -->
		<div id="content" data-role="content">
			<div data-theme="a" data-form="ui-body-a" class="ui-body ui-body-a ui-corner-all"><p><div id="main">Please choose your items</div></p></div>
		</div>
	</div>
	<div data-role="page" id="cart" data-theme="a">
		<div data-role="header">
			<a href="#menu" rel="external" id="bt-menu" data-transition="none" data-icon="carat-l">Menu</a>
			<h1 id="main_title"><div id="title_cart">Cart</div></h1><p style="margin-top:-7px"/></p>
		</div><!-- /header -->
		<div id="content" data-role="content" data-theme="a">
			<div class="simpleCart_items"></div>
			<p></p>
			<div id="cart_total">Total VAT:</div> <span class="simpleCart_total"></span>
			<br /> 
			<span id="nbmenu1"></span><span id="nbmenu2"></span>
			<br /> 
			<p></p>
			<a id="bt-empty_cart" href="javascript:;" class="simpleCart_empty" data-role="button" data-icon="delete" data-inline="true">Empty cart</a>
			<a id="bt-checkout" href="#" rel="external" data-transition="none" onclick="checkEmptyCart()" data-role="button" data-icon="carat-r" data-inline="true">Checkout</a>
		</div>
	</div>
	<div data-role="page" id="pickup" data-theme="a">
		<div data-role="header">
			<a id="bt-cart" href="#cart" data-transition="none" data-icon="carat-l">Cart</a>
			<h1 id="main_title"><div id="title_pickup">Pickup</div></h1>
			<a href="#cart" rel="external" data-transition="none" data-icon="grid"><span class="simpleCart_grandTotal"></span></a>
		</div>
		<div id="content" data-role="content" data-theme="a">
			<form id="order" name="order">
				<p id="order-when">When do you want to pick it up ?</p>
				<input id="datepicker" name="datepicker" class="datepicker" type="text" required/>
				<p></p>
				<input id="timepicker" name="timepicker" class="timepicker" type="text" required/>
				<p></p>
				<label id="order-phone" for="phone">Your phone number:</label>   
				<input name="phone" id="phone" value="" required/>
				<p></p>
				<label id="order-email" for="email">Your email:</label>   
				<input name="email" id="email" value="" required/>
				<p></p>
				<label id="order-name" for="name">Your name:</label>   
				<input name="name" id="name" value="" required/>
				<label id="order-comment" for="comment">Any comment ?</label>   
				<input name="comment" id="comment" value="" required/>
				<p id="order-total">Total order:</p> <span class="simpleCart_grandTotal"></span>
				<p></p>
				<input id="order-checkout" type="submit" value="Checkout" onclick="goCheckout();" rel="external" data-transition="none" data-icon="carat-r" data-role="button" data-inline="true"/>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="inc/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="inc/jquery.mobile-1.4.5.min.js"></script>
	<script type="text/javascript" src="inc/simpleCart.min.js"></script>
	<script type="text/javascript" src="inc/jquery.validate.min.js"></script>
	<script type="text/javascript" src="inc/jquery.i18n.min.js"></script>
	<script type="text/javascript" src="inc/dico.js"></script>
	<script type="text/javascript" src="inc/hnk.js"></script>
	<script src="inc/pickadate/lib/picker.js"></script>
	<script src="inc/pickadate/lib/picker.date.js"></script>
	<script src="inc/pickadate/lib/picker.time.js"></script>
	<script src="inc/pickadate/lib/legacy.js"></script>
	<script src="inc/pickadate/demo/scripts/demo.js"></script>
	<script src="inc/pickadate/demo/scripts/rainbow.js"></script>
	<script type="text/javascript" src="inc/order.js"></script>
	<script type="text/javascript">	

	//translation init
	var t = $.i18n;

	var products = JSON.parse(localStorage["products"]);
	var params = JSON.parse(localStorage["params"]);

	//date & time picker init
	$('#timepicker').val(t._('Please select a date'));
	$('.timepicker').textinput({ disabled: true });
	
	var $input_time = $('.timepicker').pickatime({
		formatLabel: 'H:i',
		formatSubmit: 'H:i',
		format: 'H:i',
		clear: t._('Clear'),
		interval: returnObj(params.pickup_intervals),
		min: returnObj(params.min_time),
		max: returnObj(params.max_time),
		editable: false
	});
	var picker_time = $input_time.pickatime('picker')
	var $input = $('.datepicker').pickadate({
		onSet: function() {
			picker = this;
			pick_date_obj = picker.get('select', 'dddd');
			if(pick_date_obj) { 
				$('.timepicker').textinput({ disabled: false });
				$('#timepicker').val(t._('Please select a time'));
			} else {
				$('.timepicker').textinput({ disabled: true });
				$('#timepicker').val(t._('Please select a date'));
			}
			picker_time.render(true);
			if(pick_date_obj) setTimepicker(getHours(pick_date_obj));
		},
		monthsFull: [t._('January'), t._('February'), t._('March'), t._('April'), t._('May'), t._('June'), t._('July'), t._('August'), t._('September'), t._('October'), t._('November'), t._('December')],
		weekdaysShort: [t._('Sun'), t._('Mon'), t._('Tue'), t._('Wed'), t._('Thu'), t._('Fri'), t._('Sat')],
		today: t._('Today'),
		clear: t._('Clear'),
		format: date_format,
		formatSubmit: 'yyyy-mm-dd',
		firstDay: 1,
		min: true,
		max: returnObj(params.max_order_days),
		editable: false, 
		'disable': [ returnObj(params.disabled_day) ]
	});	

	//Cart columns init
	simpleCart({
		cartColumns: [
		{ view:'image' , attr:'thumb', label: false},         
		{view : function(item, column){
			line = item.get('name');
			if(item.get('stype') >=1000 ) {
				line = line + "<br />" + t._('Burger:') + ' ' + translateText(getPdtName(item.get('burger')));
				line = line + "<br />" + t._('Drink:') + ' ' + translateText(getPdtName(item.get('drink')));
				line = line + "<br />" + t._('Side:') + ' ' + translateText(getPdtName(item.get('side')));
				if(item.get('dessert') >0 ) line = line + "<br />" + t._('Dessert:') + ' ' + translateText(getPdtName(item.get('dessert')));
			}
			if(item.get('friessauce') >0 ) line = line + "<br />" + t._('Sauce: ') + translateText(getPdtName(item.get('friessauce')));
			if(item.get('extracheese') >0 ) line = line + "<br />+ " + t._('vegan cheese');
			if(item.get('extragf') >0 ) line = line + "<br />+ " + t._('gluten free option');
			return line;
		},
		attr : 'Products', label: t._('Products')},
		{ view: "currency", attr: "price", label: t._('Price')},
		{ view: "increment", label: false},
		{ attr: "quantity", label: t._('Qty')},
		{ view: "decrement", label: false},
		{ view: "remove", text: t._('X'), label: false}
		],
		cartStyle: "table",
		checkout: {
			type: "SendForm" ,
			url: params.url_payment_process
		},
		currency: "EUR",
		data: {},
		language: "english-us",
		//to avoid seeing it on paypal
		excludeFromCheckout: ['thumb', 'burger', 'extracheese', 'extragf', 'side', 'friessauce', 'drink', 'dessert', 'mid', 'stype'],
		shippingCustom: null,
		shippingFlatRate: 0,
		shippingQuantityRate: 0,
		shippingTotalRate: 0,
		taxRate: 0,
		taxShipping: false,
		beforeAdd            : null,
		afterAdd            : null,
		load                : null,
		beforeSave        : null,
		afterSave            : null,
		update            : null,
		ready            : null,
		checkoutSuccess    : null,
		checkoutFail        : null,
		beforeCheckout        : null,
		beforeRemove : null
	});

	//add extras to cart
	simpleCart.bind( 'beforeAdd' , function( pdt )
	{
		var plus_price = 0;
		if( pdt.get( 'extracheese' ) == 1 ) {			
			plus_price = plus_price + parseFloat(params.extracheese_price);
		}
		if( pdt.get( 'extragf' ) == 1 ) {			
			plus_price = plus_price + parseFloat(params.extragf_price);
		}
		
		//start - Higly ugly patch because: https://github.com/wojodesign/simplecart-js/issues/498
		if(pdt.get('friessauce')) {
			var sa = pdt.get('friessauce');
			var sa_id = sa.substring(sa.lastIndexOf(',') + 1).trim();
			pdt.set("friessauce", sa_id);			
		}
		//end
		
		if( pdt.get( 'stype' ) >= 1000 ) {
			
			//start - Higly ugly patch because: https://github.com/wojodesign/simplecart-js/issues/498
			var d = pdt.get('drink');
			var d_id = d.substring(d.lastIndexOf(',') + 1).trim();
			pdt.set("drink", d_id);
			
			var b = pdt.get('burger');
			var b_id = b.substring(b.lastIndexOf(',') + 1).trim();
			pdt.set("burger", b_id);

			var s = pdt.get('side');
			var s_id = s.substring(s.lastIndexOf(',') + 1).trim();
			pdt.set("side", s_id);
			
			var sa = pdt.get('friessauce');
			var sa_id = sa.substring(sa.lastIndexOf(',') + 1).trim();
			pdt.set("friessauce", sa_id);			
						
			var si = pdt.get('side');
			var si_id = si.substring(si.lastIndexOf(',') + 1).trim();
			pdt.set("side", si_id);
			
			if(pdt.get('dessert')) {
				var de = pdt.get('dessert');
				var de_id = de.substring(de.lastIndexOf(',') + 1).trim();
				pdt.set("dessert", de_id);
			}
			//end
			
			//add extra price in product att	
			var result_pdt = $.grep(products, function(e){ return e.id == d_id; });
			products_att = result_pdt[0]['att'];
			if(products_att) {
				extra_price = getExtraPrice(products_att);
				plus_price = parseFloat(plus_price) + parseFloat(extra_price);
			}
		}
		pdt.price( pdt.get( 'price' ) + parseFloat(plus_price) );
	}
);

// Translation 
$('a#bt-back').text($.i18n._('Back'));
$('div#title_cart').text($.i18n._('Cart'));
$('div#title_menu').text($.i18n._('Menu'));
$('div#title_pickup').text($.i18n._('Pickup'));
$('a#bt-menus').text($.i18n._('Menus'));
$('a#bt-burgers').text($.i18n._('Burgers'));
$('a#bt-drinks').text($.i18n._('Drinks'));
$('a#bt-sides').text($.i18n._('Sides'));
$('a#bt-desserts').text($.i18n._('Desserts'));
$('div#main').text($.i18n._('Please choose your items'));
$('div#cart_total').text($.i18n._('Total VAT:'));
$('a#bt-cart').text($.i18n._('Cart'));
$('a#bt-empty_cart').text($.i18n._('Empty cart'));
$('a#bt-checkout').text($.i18n._('Checkout'));
$('p#order-when').text($.i18n._('When do you want to pick it up ?'));
$('p#order-hour').text($.i18n._('Our restaurant is open from:'));
$('label#order-phone').text($.i18n._('Your phone number:'));
$('label#order-email').text($.i18n._('Your email:'));
$('label#order-name').text($.i18n._('Your name:'));
$('label#order-comment').text($.i18n._('Any comment ?'));
$('p#order-total').text($.i18n._('Total order:'));
$('input[type=submit]#order-checkout').text($.i18n._('Checkout'));

//no timestamp set from index page = error message + hide navbar
ts = localStorage["ts"];
$("#navbar").parent().hide();
if (isNaN(ts))  { 
	alert(t._('Communication server fail, are you connected to the Internet?'));
} else {
	enableDiv("#navbar");
}
</script>
</body>
</html>