$(document).ready(function(){	
	$(".createdailydeal").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var formData = new FormData($(this)[0]);
        var button_content = $(this).find('button[type=submit]');
        var content = $(this).find('div');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/createdailydeal",
				type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
                content.delay(6000).fadeOut('slow');
                $('#refresh').delay(8000).fadeIn('slow');
            })
                    e.preventDefault();
		});

});


$(document).ready(function(){	
	$(".admindeletedailydeals").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/admindeletedailydeals",
				type: "POST",
				data: form_data
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
            })
                    e.preventDefault();
		});

});


$(document).ready(function(){	
	$(".adminupdatedailydeals").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var formData = new FormData($(this)[0]);
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/adminupdatedailydeals",
				type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
                $('#refresh').delay(6000).fadeIn('slow');
            })
                    e.preventDefault();
		});

});

$(document).ready(function(){	
	$(".admincreatevendors").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var formData = new FormData($(this)[0]);
        var button_content = $(this).find('button[type=submit]');
        var content = $(this).find('div');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/admincreatevendors",
				type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
                content.delay(6000).fadeOut('slow');
                $('#refresh').delay(8000).fadeIn('slow');
            })
                    e.preventDefault();
		});

});

$(document).ready(function(){	
	$(".admineditvendors").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var formData = new FormData($(this)[0]);
        var button_content = $(this).find('button[type=submit]');
        var content = $(this).find('div');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/admineditvendors",
				type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
                content.delay(6000).fadeOut('slow');
                $('#refresh').delay(8000).fadeIn('slow');
            })
                    e.preventDefault();
		});

});

$(document).ready(function(){	
	$(".admindeletevendors").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var formData = new FormData($(this)[0]);
        var button_content = $(this).find('button[type=submit]');
        var content = $(this).find('div');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/admindeletevendors",
				type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
                content.delay(6000).fadeOut('slow');
                $('#refresh').delay(8000).fadeIn('slow');
            })
                    e.preventDefault();
		});

});



$(document).ready(function(){	
	$(".profilemakebrand").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var formData = new FormData($(this)[0]);
        var button_content = $(this).find('button[type=submit]');
        var content = $(this).find('div');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/profilemakebrand",
				type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
                content.delay(6000).fadeOut('slow');
                $('#refresh').delay(8000).fadeIn('slow');
            })
                    e.preventDefault();
		});

});


// brend create
$(document).ready(function(){	
	$("#brandactivator").click(function(e){
        $('#brandcontent').fadeOut('slow');
        $('#createbrandform').delay(1000).fadeIn('slow');
        $('.brandpostinfo').fadeIn('slow');
        $('#closepostform').delay(2000).fadeIn('slow')
	});
});

// brand create dismiss
$(document).ready(function(){	
	$("#closepostform").click(function(e){
        $('#closepostform').fadeOut('slow')
        $('#createbrandform').delay(1000).fadeOut('slow');
        $('#brandcontent').delay(2000).fadeIn('slow');
	});
});




// Wishlist
$(document).ready(function(){	
	$(".wishlist").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/wishlist",
				type: "POST",
				data: form_data
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
                $('#wishlistcounter').load('/wishlistreload').fadeIn('slow');
            })
                    e.preventDefault();
		});

});




// addtocart
$(document).ready(function(){	
	$(".addtocart").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/addtocart",
				type: "POST",
				data: form_data
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
                $('#cartcounter').load('/cartreload').fadeIn('slow');
            })
                    e.preventDefault();
		});

});